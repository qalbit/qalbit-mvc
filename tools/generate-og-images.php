<?php
/**
 * Generates branded 1200x630 Open Graph cards for key pages.
 *
 * Usage: php tools/generate-og-images.php
 * Requires Google Chrome (headless) on the machine. Idempotent – re-run any time
 * page names change. Output: public/assets/images/og/pages/{slug-key}.png
 * The layout picks these up automatically via og_image_url() convention.
 */

require __DIR__ . '/../bootstrap/env.php';
require __DIR__ . '/../bootstrap/app.php';

$chrome = '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';
if (!is_file($chrome)) {
    fwrite(STDERR, "Chrome not found at $chrome\n");
    exit(1);
}

$outDir = __DIR__ . '/../public/assets/images/og/pages';
$tmpDir = sys_get_temp_dir() . '/qalbit-og';
@mkdir($outDir, 0755, true);
@mkdir($tmpDir, 0755, true);

$logoPath = realpath(__DIR__ . '/../public/assets/images/brand/logo-light.svg');

// ---------------------------------------------------------------------------
// Pages to generate: slug => [eyebrow, title, footer-hook]
// ---------------------------------------------------------------------------
$pages = [];

// Services (enabled only)
foreach (config('services', []) as $service) {
    if (empty($service['enabled']) || empty($service['slug'])) continue;
    $pages[$service['slug']] = [
        'eyebrow' => 'Custom Software & SaaS Studio',
        'title'   => $service['name'],
        'hook'    => 'Senior engineers, AI-accelerated delivery — and you own the code.',
    ];
}

// Hire pages + hub
foreach (config('hire', []) as $role) {
    if (empty($role['enabled']) || empty($role['slug'])) continue;
    $pages[$role['slug']] = [
        'eyebrow' => 'Hire Dedicated Developers',
        'title'   => preg_replace('/^Hire /', '', $role['name']),
        'hook'    => 'Onboard in 1–2 weeks with US/UK/GCC overlap and a replacement guarantee.',
    ];
}
$pages['/hire-developers/'] = [
    'eyebrow' => 'Hire Dedicated Developers',
    'title'   => 'Your Remote Squad in India',
    'hook'    => 'Laravel, Node.js, Next.js, React & Flutter teams for startups and businesses.',
];

// Industries (enabled only)
foreach (config('industries', []) as $industry) {
    if (empty($industry['enabled']) || empty($industry['slug'])) continue;
    $name = $industry['name'] ?? ucwords(str_replace('-', ' ', trim(basename($industry['slug']))));
    $pages[$industry['slug']] = [
        'eyebrow' => 'Industry Solutions',
        'title'   => $name,
        'hook'    => 'Custom software, web & mobile apps built for your industry.',
    ];
}

// Technologies (enabled only)
foreach (config('technologies', []) as $tech) {
    if (empty($tech['enabled']) || empty($tech['slug'])) continue;
    $pages[$tech['slug']] = [
        'eyebrow' => 'Technology Expertise',
        'title'   => $tech['name'] ?? ucwords(basename($tech['slug'])),
        'hook'    => $tech['tagline'] ?? 'Product-grade engineering with modern, proven stacks.',
    ];
}

// Geo pages (all enabled; Riyadh & Ahmedabad overridden below)
foreach (config('geo', []) as $geo) {
    if (empty($geo['enabled']) || empty($geo['slug'])) continue;
    $short = $geo['short_name'] ?? ($geo['name'] ?? '');
    $pages[$geo['slug']] = [
        'eyebrow' => 'Serving ' . ($geo['name'] ?? $short),
        'title'   => 'Custom Software in ' . $short,
        'hook'    => 'Web, mobile & SaaS engineering for ' . $short . ' businesses.',
    ];
}

// Our Process pages
$pages['/start-up-mvp/'] = [
    'eyebrow' => 'Our Process',
    'title'   => 'Start-up MVP',
    'hook'    => 'From idea to launched product in 8–16 weeks — clean code you own.',
];
$pages['/product-scaling/'] = [
    'eyebrow' => 'Our Process',
    'title'   => 'Product Scaling Team',
    'hook'    => 'Stabilise, optimise and scale your live product with a senior squad.',
];
$pages['/digital-transformation/'] = [
    'eyebrow' => 'Our Process',
    'title'   => 'Digital Transformation',
    'hook'    => 'From spreadsheets and legacy systems to integrated platforms.',
];
$pages['/engagement-model/'] = [
    'eyebrow' => 'Our Process',
    'title'   => 'Engagement Models',
    'hook'    => 'Fixed cost, time & material or dedicated squads — your choice.',
];

// Products
$pages['/products/'] = [
    'eyebrow' => 'Our Products',
    'title'   => 'SaaS We Built & Run',
    'hook'    => 'URLCrop, LiftUp, PocketGST & Emplyft — proof of how we build.',
];
foreach (config('products.items', []) as $product) {
    if (empty($product['enabled']) || empty($product['slug'])) continue;
    $pages['/products/' . trim($product['slug'], '/') . '/'] = [
        'eyebrow' => 'Our Products',
        'title'   => $product['name'] ?? ucwords($product['slug']),
        'hook'    => $product['valueProp'] ?? ($product['tagline'] ?? 'Built, shipped and operated by QalbIT.'),
    ];
}

// Core pages
$pages['/about-us/'] = [
    'eyebrow' => 'About QalbIT',
    'title'   => 'The Team Behind the Software',
    'hook'    => 'A founder-led product studio in Ahmedabad, serving clients worldwide.',
];
$pages['/services/'] = [
    'eyebrow' => 'Custom Software & SaaS Studio',
    'title'   => 'Software Development Services',
    'hook'    => 'Custom software, CRM, ERP, MVP, SaaS, web, mobile & AI.',
];
$pages['/industries/'] = [
    'eyebrow' => 'Industry Solutions',
    'title'   => 'Software for Your Industry',
    'hook'    => 'E-commerce, fintech, healthcare, real estate, education & more.',
];
$pages['/technologies/'] = [
    'eyebrow' => 'Technology Expertise',
    'title'   => 'Technologies We Build With',
    'hook'    => 'React, Next.js, Node.js, Laravel, Flutter & more.',
];
$pages['/portfolio/'] = [
    'eyebrow' => 'Our Work',
    'title'   => 'Portfolio & Case Studies',
    'hook'    => 'Products, platforms and tools we designed, built and shipped.',
];
$pages['/contact-us/'] = [
    'eyebrow' => 'Let’s Talk',
    'title'   => 'Start Your Project',
    'hook'    => 'Share your requirements — we respond within 24–48 hours.',
];
$pages['/career/'] = [
    'eyebrow' => 'Careers at QalbIT',
    'title'   => 'Build Real Products With Us',
    'hook'    => 'Engineering careers in Makarba, Ahmedabad.',
];
$pages['/sitemap/'] = [
    'eyebrow' => 'QalbIT',
    'title'   => 'Explore the Site',
    'hook'    => 'Services, industries, technologies, tools and case studies.',
];
$pages['/privacy-policy/'] = [
    'eyebrow' => 'QalbIT',
    'title'   => 'Privacy Policy',
    'hook'    => 'How we collect, use and protect your data.',
];
$pages['/terms-and-condition/'] = [
    'eyebrow' => 'QalbIT',
    'title'   => 'Terms & Conditions',
    'hook'    => 'The terms we work under, in plain language.',
];
$pages['/cookie-policy/'] = [
    'eyebrow' => 'QalbIT',
    'title'   => 'Cookie Policy',
    'hook'    => 'How cookies are used on qalbit.com.',
];

// Tools
$pages['/tools/software-development-cost-calculator/'] = [
    'eyebrow' => 'Free Estimation Tool',
    'title'   => 'Software Development Cost Calculator',
    'hook'    => 'Instant 2026 estimates for MVP, CRM, ERP, SaaS & mobile projects.',
];
$pages['/tools/json-formatter/'] = [
    'eyebrow' => 'Free Developer Tool',
    'title'   => 'JSON Formatter, Validator & Minifier',
    'hook'    => 'Format, validate and minify JSON — 100% in your browser.',
];

// Key geo pages
$pages['/saudi-arabia/riyadh/'] = [
    'eyebrow' => 'Serving Saudi Arabia',
    'title'   => 'Custom Software Development in Saudi Arabia',
    'hook'    => 'Custom software, SaaS & mobile for Riyadh, Jeddah and the wider KSA.',
];
$pages['/india/ahmedabad/'] = [
    'eyebrow' => 'Makarba · Ahmedabad',
    'title'   => 'Custom Software Company in Ahmedabad',
    'hook'    => 'CRM, ERP, SaaS & mobile engineering for startups and businesses.',
];

// Case studies index + hub pages
$pages['/case-studies/'] = [
    'eyebrow' => 'Case Studies',
    'title'   => 'Real Products, Real Outcomes',
    'hook'    => 'SaaS platforms, portals and mobile products — what we built and what it changed.',
];

// ---------------------------------------------------------------------------
$illustrationPath = realpath(__DIR__ . '/../public/assets/images/og/og-illustration.png');

$template = static function (string $eyebrow, string $title, string $hook) use ($logoPath, $illustrationPath): string {
    $e = htmlspecialchars($eyebrow);
    $h = htmlspecialchars($hook);

    // Title with a green accent full stop, matching the brand card.
    $t = htmlspecialchars(rtrim($title, '.'));
    $len = mb_strlen($title);
    $titleSize = $len > 34 ? '54px' : ($len > 22 ? '62px' : '72px');

    return <<<HTML
<!DOCTYPE html>
<html><head><meta charset="utf-8"><style>
  * { margin:0; padding:0; box-sizing:border-box; }
  body {
    width:1200px; height:630px; overflow:hidden; position:relative;
    font-family: "Poppins", -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    background: linear-gradient(112deg, #101a5c 0%, #0a1145 42%, #070d35 100%);
    color:#fff;
  }
  .glow {
    position:absolute; inset:0;
    background: radial-gradient(760px 480px at 78% 42%, rgba(59,90,220,.22), transparent 65%);
  }
  .art {
    position:absolute; right:-6px; top:24px; height:582px;
    -webkit-mask-image: radial-gradient(ellipse 58% 62% at center, #000 62%, transparent 92%);
            mask-image: radial-gradient(ellipse 58% 62% at center, #000 62%, transparent 92%);
  }
  .card {
    position:relative; height:100%; width:640px;
    display:flex; flex-direction:column; padding:58px 0 52px 96px;
  }
  .logo img { height:42px; }
  .pill {
    display:inline-flex; align-self:flex-start; margin-top:26px;
    background:#0e7a5a; color:#fff; border-radius:999px;
    padding:10px 22px; font-size:17px; font-weight:600; letter-spacing:.01em;
  }
  h1 {
    margin-top:30px; font-size:{$titleSize}; line-height:1.16; font-weight:700;
    letter-spacing:-.01em; color:#ffffff; max-width:560px;
  }
  h1 .dot { color:#2ee6a8; }
  .sub {
    margin-top:26px; font-size:26px; line-height:1.45; font-style:italic;
    color:#dfe5ff; font-weight:500; max-width:520px;
  }
  .domain { margin-top:auto; font-size:22px; font-weight:600; color:#ffffff; }
</style></head>
<body>
  <div class="glow"></div>
  <img class="art" src="file://{$illustrationPath}" alt="">
  <div class="card">
    <div class="logo"><img src="file://{$logoPath}" alt="QalbIT"></div>
    <div class="pill">{$e}</div>
    <h1>{$t}<span class="dot">.</span></h1>
    <div class="sub">{$h}</div>
    <div class="domain">qalbit.com</div>
  </div>
</body></html>
HTML;
};

$count = 0;
foreach ($pages as $slug => $meta) {
    $key = str_replace('/', '-', trim($slug, '/'));
    $html = $tmpDir . '/' . $key . '.html';
    $png  = $tmpDir . '/' . $key . '.png';
    $out  = $outDir . '/' . $key . '.jpg';

    file_put_contents($html, $template($meta['eyebrow'], $meta['title'], $meta['hook']));

    $cmd = sprintf(
        '%s --headless --disable-gpu --hide-scrollbars --no-first-run --window-size=1200,630 --screenshot=%s file://%s 2>/dev/null',
        escapeshellarg($chrome),
        escapeshellarg($png),
        $html
    );
    exec($cmd, $o, $code);

    // Convert to JPEG (~80%) – social crawlers accept it and it is ~5x smaller.
    if (is_file($png)) {
        exec(sprintf(
            'sips -s format jpeg -s formatOptions 80 %s --out %s >/dev/null 2>&1',
            escapeshellarg($png),
            escapeshellarg($out)
        ));
        @unlink($png);
    }

    if (is_file($out)) {
        $count++;
        echo "OK  $key.jpg\n";
    } else {
        echo "FAIL $key\n";
    }
}

echo "\nGenerated $count OG cards in public/assets/images/og/pages/\n";
