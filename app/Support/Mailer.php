<?php

namespace App\Support;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Mailer
{
    /**
     * Send contact enquiry.
     *
     * Flow:
     *  1) Build email body.
     *  2) Try SMTP (if configured).
     *  3) If SMTP fails or not configured → fallback to mail().
     *  4) Log all attempts, including which transport was used.
     */
    public function sendContact(array $data): bool
    {
        $body = $this->buildBody($data);

        $sent      = false;
        $transport = 'none';

        // 1) Try SMTP if configured
        if ($this->isSmtpConfigured()) {
            $sent = $this->sendViaSmtp($data, $body);
            $transport = $sent ? 'smtp' : 'smtp_failed';
        }

        // 2) Fallback to mail() if SMTP not configured or failed
        if (!$sent) {
            $mailSent = $this->sendViaMail($data, $body);
            if ($mailSent) {
                $transport = ($transport === 'smtp_failed') ? 'mail_fallback' : 'mail';
                $sent = true;
            }
        }

        // 3) Log the enquiry + transport result
        $this->logContact($data, $sent, $transport);

        return $sent;
    }

    public function sendCareerApplication(array $data): bool
    {
        $bodies = $this->buildCareerBodies($data);
        $htmlBody = $bodies['html'];
        $textBody = $bodies['text'];

        $sent      = false;
        $transport = 'none';

        if ($this->isSmtpConfigured()) {
            $sent      = $this->sendViaSmtp($data, $htmlBody, $textBody, true);
            $transport = $sent ? 'smtp' : 'smtp_failed';
        }

        if (!$sent) {
            $mailSent = $this->sendViaMail($data, $htmlBody, true);
            if ($mailSent) {
                $transport = ($transport === 'smtp_failed') ? 'mail_fallback' : 'mail';
                $sent      = true;
            }
        }

        $this->logCareer($data, $sent, $transport);

        return $sent;
    }


        /**
     * Build both HTML + plain-text bodies for career applications.
     */
    protected function buildCareerBodies(array $data): array
    {
        // Plain-text version (fallback, logs, AltBody)
        $lines = [
            'Type: Career application',
            'Role slug: ' . ($data['role_slug'] ?? ''),
            'Full name: ' . ($data['full_name'] ?? $data['name'] ?? ''),
            'Email: ' . ($data['email'] ?? ''),
            'Phone: ' . ($data['phone'] ?? ''),
            'Location: ' . ($data['location'] ?? ''),
            'Experience (years): ' . ($data['experience'] ?? ''),
            'Current / last role: ' . ($data['current_role'] ?? ''),
            'Notice period: ' . ($data['notice_period'] ?? ''),
            'LinkedIn / Portfolio: ' . ($data['linkedin'] ?? ''),
            'GitHub / Code samples: ' . ($data['github'] ?? ''),
            'Current CTC: ' . ($data['current_ctc'] ?? ''),
            'Expected CTC: ' . ($data['expected_ctc'] ?? ''),
            '',
            'Why QalbIT / Cover note:',
            $data['about'] ?? '',
            '',
            'Resume stored at: ' . ($data['file_path'] ?? 'N/A'),
        ];

        $textBody = implode("\n", $lines);

        // HTML body via template
        $siteUrl  = config('app.url', 'https://qalbit.com');
        $siteName = config('app.name', 'QalbIT');

        $htmlBody = $this->renderEmailTemplate('career-application', [
            'data'     => $data,
            'siteUrl'  => $siteUrl,
            'siteName' => $siteName,
        ]);

        return [
            'html' => $htmlBody,
            'text' => $textBody,
        ];
    }

    protected function logCareer(array $data, bool $sent, string $transport): void
    {
        $basePath = dirname(__DIR__, 2);
        $logDir   = $basePath . '/storage/logs';

        if (!is_dir($logDir)) {
            @mkdir($logDir, 0775, true);
        }

        $logFile = $logDir . '/career.log';

        $logLine = sprintf(
            "[%s] role=%s | name=%s | email=%s | exp=%s | resume=%s | sent=%s | transport=%s\n",
            date('c'),
            $data['role_slug']     ?? '',
            $data['full_name']     ?? $data['name'] ?? '',
            $data['email']         ?? '',
            $data['experience']    ?? '',
            $data['file_path']   ?? '',
            $sent ? 'yes' : 'no',
            $transport
        );

        @file_put_contents($logFile, $logLine, FILE_APPEND);
    }


    // ---------------------------------------------------------
    // Internal helpers
    // ---------------------------------------------------------

    protected function buildBody(array $data): string
    {
        $lines = [
            "Name: "        . ($data['name'] ?? ''),
            "Email: "       . ($data['email'] ?? ''),
            "Phone: "       . ($data['phone'] ?? ''),
            "Country: "     . ($data['lead_country'] ?? ''),
            "Message:"      . ($data['message'] ?? ''),
            "Lead From:"    . ($data['lead_from'] ?? ''),
            "Lead Source:"  . ($data['lead_source'] ?? ''),
            "Lead Topic:"   . ($data['lead_topic'] ?? ''),
        ];

        return implode("\n", $lines);
    }

    protected function isSmtpConfigured(): bool
    {
        $config = config('mail', []);
        return !empty($config['host']);
    }

    /**
     * SMTP via PHPMailer.
     *
     * @param array  $data
     * @param string $body     Main body (HTML or plain text)
     * @param string|null $altBody Plain-text fallback (for HTML mails)
     * @param bool   $isHtml   Whether $body is HTML
     */
    protected function sendViaSmtp(array $data, string $body, ?string $altBody = null, bool $isHtml = false): bool
    {
        $config = config('mail', []);
        if (empty($config['host'])) {
            return false;
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $config['host'];
            $mail->Port = $config['port'] ?? 587;

            $mail->SMTPAuth = !empty($config['username']) || !empty($config['password']);
            if ($mail->SMTPAuth) {
                $mail->Username = $config['username'] ?? '';
                $mail->Password = $config['password'] ?? '';
            }

            $encryption = $config['encryption'] ?? 'tls';
            if ($encryption === 'tls') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            } elseif ($encryption === 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            }

            $mail->CharSet = 'UTF-8';

            $fromEmail = $config['from_email'] ?? config('app.from_email', 'no-reply@qalbit.com');
            $fromName  = $config['from_name']  ?? config('app.name', 'QalbIT');
            $toEmail   = $config['to_career']   ?? config('app.contact_email', 'info@qalbit.com');
            $ccEmail   = $config['to_email']   ?? config('app.contact_email', 'info@qalbit.com');

            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($toEmail);
            $mail->addBCC($ccEmail);

            if (!empty($data['email'])) {
                $mail->addReplyTo($data['email'], $data['name'] ?? '');
            }

            // Attach resume if available
            if (!empty($data['file_path'])) {
                $basePath       = dirname(__DIR__, 2);
                $resumeAbsolute = $basePath . $data['file_path'];
                if (is_readable($resumeAbsolute)) {
                    $mail->addAttachment($resumeAbsolute, basename($resumeAbsolute));
                }
            }

            $subject = $data['mail_subject']
                ?? ('New enquiry from ' . ($data['name'] ?? 'Website visitor'));

            $mail->Subject = $subject;

            if ($isHtml) {
                $mail->isHTML(true);
                $mail->Body    = $body;
                $mail->AltBody = $altBody ?: strip_tags($body);
            } else {
                $mail->isHTML(false);
                $mail->Body    = $body;
                $mail->AltBody = $body;
            }

            $mail->send();
            return true;
        } catch (PHPMailerException $e) {
            $this->logError('SMTP error: ' . $e->getMessage());
            return false;
        }
    }

    protected function sendViaMail(array $data, string $body, bool $isHtml = false): bool
    {
        $to      = config('app.contact_email', 'info@qalbit.com');
        $from    = config('app.from_email', 'no-reply@qalbit.com');

        $subject = $data['mail_subject']
            ?? ('New enquiry from ' . ($data['name'] ?? 'Website visitor'));

        $headers   = [];
        $headers[] = 'From: ' . $from;
        if (!empty($data['email'])) {
            $headers[] = 'Reply-To: ' . $data['email'];
        }

        if ($isHtml) {
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: text/html; charset=UTF-8';
        } else {
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';
        }

        $headersString = implode("\r\n", $headers);

        if (function_exists('mail')) {
            return @mail($to, $subject, $body, $headersString);
        }

        return false;
    }

    protected function logContact(array $data, bool $sent, string $transport): void
    {
        $basePath = dirname(__DIR__, 2); // from app/Support to project root
        $logDir   = $basePath . '/storage/logs';

        if (!is_dir($logDir)) {
            @mkdir($logDir, 0775, true);
        }

        $logFile = $logDir . '/contact.log';

        $logLine = sprintf(
            "[%s] name=%s | email=%s | budget=%s | sent=%s | transport=%s\nMessage: %s\n----\n",
            date('c'),
            $data['name']   ?? '',
            $data['email']  ?? '',
            $data['budget'] ?? '',
            $sent ? 'yes' : 'no',
            $transport,
            str_replace(["\r\n", "\r", "\n"], ' ', $data['message'] ?? '')
        );

        @file_put_contents($logFile, $logLine, FILE_APPEND);
    }

    protected function logError(string $message): void
    {
        $basePath = dirname(__DIR__, 2);
        $logDir   = $basePath . '/storage/logs';

        if (!is_dir($logDir)) {
            @mkdir($logDir, 0775, true);
        }

        $logFile = $logDir . '/contact-error.log';
        $logLine = sprintf("[%s] %s\n", date('c'), $message);

        @file_put_contents($logFile, $logLine, FILE_APPEND);
    }

    /**
     * Render a simple PHP email template from resources/views/emails.
     */
    protected function renderEmailTemplate(string $view, array $vars = []): string
    {
        $basePath = dirname(__DIR__, 2);
        $file     = $basePath . '/resources/views/emails/' . $view . '.php';

        if (!is_file($file)) {
            // If template is missing, fail loudly so we notice in logs
            throw new \RuntimeException('Email template not found: ' . $file);
        }

        extract($vars, EXTR_SKIP);

        ob_start();
        include $file;
        return (string) ob_get_clean();
    }

}
