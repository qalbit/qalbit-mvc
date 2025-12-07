<?php

namespace App\Support;

class File
{
    /**
     * Store uploaded candidate resume under:
     *   storage/upload/jobs/ROLE_SLUG/candidate_EXPERIENCE_FULL-NAME.ext
     *
     * Returns relative path like:
     *   /storage/upload/jobs/backend-developer/candidate_3-years_john-doe.pdf
     *
     * On failure → returns null and adds an error to $errors[$errorKey].
     */
    public static function storeCandidateResume(
        array $file,
        ?string $roleSlug,
        string $fullName,
        ?string $experience,
        array &$errors,
        string $errorKey = 'resume'
    ): ?string {
        // Basic checks
        $errorCode = $file['error'] ?? UPLOAD_ERR_NO_FILE;

        if ($errorCode === UPLOAD_ERR_NO_FILE) {
            $errors[$errorKey] = 'Please upload your resume (PDF, DOC, or DOCX).';
            return null;
        }

        if (!isset($file['tmp_name'], $file['name'])) {
            $errors[$errorKey] = 'Invalid resume upload. Please try again.';
            return null;
        }

        if ($errorCode !== UPLOAD_ERR_OK) {
            $errors[$errorKey] = 'We could not upload your resume. Please try again.';
            return null;
        }

        // Size limit (5 MB)
        $maxSize = 5 * 1024 * 1024;
        if (!empty($file['size']) && $file['size'] > $maxSize) {
            $errors[$errorKey] = 'Resume file is too large. Maximum size is 5 MB.';
            return null;
        }

        $originalName = (string) $file['name'];
        $ext          = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        $allowed = ['pdf', 'doc', 'docx'];
        if (!in_array($ext, $allowed, true)) {
            $errors[$errorKey] = 'Invalid resume format. Please upload a PDF, DOC, or DOCX file.';
            return null;
        }

        // Role-based folder
        $roleFolder = $roleSlug ?: 'general';
        $roleFolder = strtolower(preg_replace('/[^a-z0-9\-]+/i', '-', $roleFolder));
        $roleFolder = trim($roleFolder, '-');
        if ($roleFolder === '') {
            $roleFolder = 'general';
        }

        // Experience slug
        $expValue = trim((string) $experience);
        if ($expValue !== '' && is_numeric($expValue) && (float) $expValue >= 0) {
            // E.g. "3" => "3-years", "2.5" => "2-5-years"
            $expSanitized = preg_replace('/[^0-9]+/i', '-', $expValue);
            $expSanitized = trim($expSanitized, '-');
            $expSlug      = $expSanitized . '-years';
        } else {
            $expSlug = 'exp-unknown';
        }

        // Name slug
        $nameSlug = preg_replace('/[^a-z0-9]+/i', '-', strtolower($fullName));
        $nameSlug = trim($nameSlug, '-');
        if ($nameSlug === '') {
            $nameSlug = 'candidate';
        }

        $fileName = sprintf('candidate_%s_%s.%s', $expSlug, $nameSlug, $ext);

        $basePath     = dirname(__DIR__, 2); // project root
        $relativeDir  = '/storage/upload/jobs/' . $roleFolder;
        $relativePath = $relativeDir . '/' . $fileName;
        $absoluteDir  = $basePath . $relativeDir;
        $absolutePath = $basePath . $relativePath;

        if (!is_dir($absoluteDir) && !@mkdir($absoluteDir, 0775, true) && !is_dir($absoluteDir)) {
            $errors[$errorKey] = 'We could not create the upload directory. Please try again later.';
            return null;
        }

        // Avoid overwriting – append timestamp if needed
        if (file_exists($absolutePath)) {
            $fileName     = sprintf('candidate_%s_%s_%s.%s', $expSlug, $nameSlug, date('Ymd-His'), $ext);
            $relativePath = $relativeDir . '/' . $fileName;
            $absolutePath = $basePath . $relativePath;
        }

        if (!@move_uploaded_file($file['tmp_name'], $absolutePath)) {
            $errors[$errorKey] = 'We could not save your resume on the server. Please try again.';
            return null;
        }

        return $relativePath; // e.g. "/storage/upload/jobs/backend-developer/candidate_3-years_john-doe.pdf"
    }
}
