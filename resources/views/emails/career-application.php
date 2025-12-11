<?php
/** @var array $data */
/** @var string $siteUrl */
/** @var string $siteName */

$fullName = $data['full_name'] ?? $data['name'] ?? 'New candidate';
$roleSlug = $data['role_slug'] ?? 'react-nextjs-developer';
$email    = $data['email'] ?? '';
$phone    = $data['phone'] ?? '';
$location = $data['location'] ?? '';
$exp      = $data['experience'] ?? '';
$current  = $data['current_role'] ?? '';
$notice   = $data['notice_period'] ?? '';
$linkedin = $data['linkedin'] ?? '';
$github   = $data['github'] ?? '';
$currentCtc  = $data['current_ctc'] ?? '';
$expectedCtc = $data['expected_ctc'] ?? '';
$about       = $data['about'] ?? '';
$filePath    = $data['file_path'] ?? 'N/A';

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New career application – <?= e($fullName) ?></title>
</head>
<body style="margin:0; padding:0; background-color:#f3f4f6;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f3f4f6; padding:24px 0;">
    <tr>
        <td align="center">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px; background-color:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #e5e7eb;">
                <!-- Header -->
                <tr>
                    <td style="padding:16px 24px; background-color:#0f172a; color:#e5e7eb; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;">
                        <div style="font-size:11px; text-transform:uppercase; letter-spacing:1.4px; opacity:0.8;">
                            Career application received
                        </div>
                        <div style="font-size:17px; font-weight:600; margin-top:4px;">
                            <?= e($fullName) ?> – <?= e($roleSlug) ?>
                        </div>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:20px 24px 8px; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif; font-size:14px; color:#111827; line-height:1.6;">
                        <p style="margin:0 0 16px;">
                            You have received a new career application via <strong><?= e($siteName) ?></strong>.
                        </p>

                        <!-- Details table -->
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin-bottom:16px;">
                            <tbody>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Full name</td>
                                <td style="padding:6px 8px;"><?= e($fullName) ?></td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Email</td>
                                <td style="padding:6px 8px;">
                                    <a href="mailto:<?= e($email) ?>" style="color:#0369a1; text-decoration:none;">
                                        <?= e($email) ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Phone</td>
                                <td style="padding:6px 8px;"><?= e($phone) ?></td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Location</td>
                                <td style="padding:6px 8px;"><?= e($location) ?></td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Experience</td>
                                <td style="padding:6px 8px;"><?= e($exp) ?> years</td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Current / last role</td>
                                <td style="padding:6px 8px;"><?= e($current) ?></td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Notice period</td>
                                <td style="padding:6px 8px;"><?= e($notice) ?></td>
                            </tr>
                            <?php if ($linkedin) : ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">LinkedIn</td>
                                    <td style="padding:6px 8px;">
                                        <a href="<?= e($linkedin) ?>" style="color:#0369a1; text-decoration:none;">
                                            <?= e($linkedin) ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($github) : ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">GitHub / Code</td>
                                    <td style="padding:6px 8px;">
                                        <a href="<?= e($github) ?>" style="color:#0369a1; text-decoration:none;">
                                            <?= e($github) ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Current CTC</td>
                                <td style="padding:6px 8px;"><?= e($currentCtc) ?></td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Expected CTC</td>
                                <td style="padding:6px 8px;"><?= e($expectedCtc) ?></td>
                            </tr>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Resume</td>
                                <td style="padding:6px 8px;">
                                    <?= e($filePath) ?><br>
                                    <span style="font-size:12px; color:#6b7280;">(The PDF is attached to this email.)</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Cover note -->
                        <?php if (trim($about) !== ''): ?>
                            <h3 style="font-size:15px; margin:8px 0 6px;">Why QalbIT / Cover note</h3>
                            <div style="background-color:#f9fafb; border-radius:6px; padding:12px 14px; font-size:14px; white-space:pre-line;">
                                <?= nl2br(e($about)) ?>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:10px 24px 14px; background-color:#f9fafb; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif; font-size:12px; color:#6b7280;">
                        <p style="margin:0;">
                            Sent from the careers form on
                            <a href="<?= e($siteUrl) ?>" style="color:#0369a1; text-decoration:none;"><?= e($siteUrl) ?></a>.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
