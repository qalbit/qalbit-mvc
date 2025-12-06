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

    // ---------------------------------------------------------
    // Internal helpers
    // ---------------------------------------------------------

    protected function buildBody(array $data): string
    {
        $lines = [
            "Name: "    . ($data['name'] ?? ''),
            "Email: "   . ($data['email'] ?? ''),
            "Budget: "  . ($data['budget'] ?? ''),
            "Message:",
            ($data['message'] ?? ''),
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
     */
    protected function sendViaSmtp(array $data, string $body): bool
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

            // Auth
            $mail->SMTPAuth = !empty($config['username']) || !empty($config['password']);
            if ($mail->SMTPAuth) {
                $mail->Username = $config['username'] ?? '';
                $mail->Password = $config['password'] ?? '';
            }

            // Encryption
            $encryption = $config['encryption'] ?? 'tls';
            if ($encryption === 'tls') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            } elseif ($encryption === 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            }

            $mail->CharSet = 'UTF-8';

            // Addresses
            $fromEmail = $config['from_email'] ?? config('app.from_email', 'no-reply@qalbit.com');
            $fromName  = $config['from_name']  ?? config('app.name', 'QalbIT');
            $toEmail   = $config['to_email']   ?? config('app.contact_email', 'info@qalbit.com');

            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($toEmail);

            if (!empty($data['email'])) {
                $mail->addReplyTo($data['email'], $data['name'] ?? '');
            }

            $subject = 'New enquiry from ' . ($data['name'] ?? 'Website visitor');

            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $body;

            $mail->send();
            return true;
        } catch (PHPMailerException $e) {
            $this->logError('SMTP error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Fallback to native mail().
     */
    protected function sendViaMail(array $data, string $body): bool
    {
        $to      = config('app.contact_email', 'info@qalbit.com');
        $from    = config('app.from_email', 'no-reply@qalbit.com');
        $subject = 'New enquiry from ' . ($data['name'] ?? 'Website visitor');

        $headers = [];
        $headers[] = 'From: ' . $from;
        if (!empty($data['email'])) {
            $headers[] = 'Reply-To: ' . $data['email'];
        }
        $headers[] = 'Content-Type: text/plain; charset=UTF-8';

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
}
