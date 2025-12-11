<?php
/** @var array  $data */
/** @var string $siteUrl */
/** @var string $siteName */

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$name      = $data['name'] ?? 'Website visitor';
$email     = $data['email'] ?? '';
$phone     = $data['phone'] ?? '';
$country   = $data['lead_country'] ?? ($data['country'] ?? '');
$company   = $data['company'] ?? '';
$budget    = $data['budget'] ?? '';
$timeline  = $data['timeline'] ?? '';
$topic     = $data['lead_topic'] ?? '';
$source    = $data['lead_source'] ?? '';
$from      = $data['lead_from'] ?? '';
$message   = $data['message'] ?? '';

$utmSource   = $data['utm_source'] ?? '';
$utmMedium   = $data['utm_medium'] ?? '';
$utmCampaign = $data['utm_campaign'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New contact enquiry – <?= e($name) ?></title>
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
                            New website enquiry
                        </div>
                        <div style="font-size:17px; font-weight:600; margin-top:4px;">
                            <?= e($name) ?><?php if ($topic): ?> · <?= e($topic) ?><?php endif; ?>
                        </div>
                        <?php if ($from || $source): ?>
                            <div style="margin-top:4px; font-size:12px; color:#9ca3af;">
                                <?php if ($from): ?>
                                    <span>From: <?= e($from) ?></span>
                                <?php endif; ?>
                                <?php if ($from && $source): ?>
                                    &nbsp;•&nbsp;
                                <?php endif; ?>
                                <?php if ($source): ?>
                                    <span>Source: <?= e($source) ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:20px 24px 8px; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif; font-size:14px; color:#111827; line-height:1.6;">
                        <p style="margin:0 0 16px;">
                            You have received a new contact enquiry via <strong><?= e($siteName) ?></strong>.
                        </p>

                        <!-- Details -->
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin-bottom:16px;">
                            <tbody>
                            <tr>
                                <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Name</td>
                                <td style="padding:6px 8px;"><?= e($name) ?></td>
                            </tr>
                            <?php if ($email): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Email</td>
                                    <td style="padding:6px 8px;">
                                        <a href="mailto:<?= e($email) ?>" style="color:#0369a1; text-decoration:none;">
                                            <?= e($email) ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($phone): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Phone</td>
                                    <td style="padding:6px 8px;"><?= e($phone) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($country): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Country</td>
                                    <td style="padding:6px 8px;"><?= e($country) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($company): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Company</td>
                                    <td style="padding:6px 8px;"><?= e($company) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($budget): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Budget</td>
                                    <td style="padding:6px 8px;"><?= e($budget) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($timeline): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Timeline</td>
                                    <td style="padding:6px 8px;"><?= e($timeline) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($topic): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Lead topic</td>
                                    <td style="padding:6px 8px;"><?= e($topic) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($source): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Lead source</td>
                                    <td style="padding:6px 8px;"><?= e($source) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($from): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">Lead from</td>
                                    <td style="padding:6px 8px;"><?= e($from) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($utmSource || $utmMedium || $utmCampaign): ?>
                                <tr>
                                    <td style="width:140px; padding:6px 8px; background-color:#f9fafb; font-weight:600;">UTM</td>
                                    <td style="padding:6px 8px;">
                                        <?php if ($utmSource): ?>Source: <?= e($utmSource) ?><br><?php endif; ?>
                                        <?php if ($utmMedium): ?>Medium: <?= e($utmMedium) ?><br><?php endif; ?>
                                        <?php if ($utmCampaign): ?>Campaign: <?= e($utmCampaign) ?><?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- Message -->
                        <?php if (trim($message) !== ''): ?>
                            <h3 style="font-size:15px; margin:8px 0 6px;">Message</h3>
                            <div style="background-color:#f9fafb; border-radius:6px; padding:12px 14px; font-size:14px; white-space:pre-line;">
                                <?= nl2br(e($message)) ?>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:10px 24px 14px; background-color:#f9fafb; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif; font-size:12px; color:#6b7280;">
                        <p style="margin:0;">
                            Sent from the contact form on
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
