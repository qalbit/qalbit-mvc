<?php
/**
 * Free JSON Formatter / Validator / Minifier – /tools/json-formatter/
 * 100% client-side: nothing is sent to the server.
 */
?>

<!-- Hero -->
<section class="bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-5">
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-sky-500 transition-colors">Home</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page">JSON Formatter</li>
            </ol>
        </nav>

        <div class="max-w-3xl space-y-4">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                Free developer tool
                <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                <span class="ml-2 opacity-80">Runs in your browser</span>
            </span>

            <h1 class="text-display-md sm:text-display-lg font-bold text-slate-900">
                JSON Formatter, Validator <span class="text-gradient-brand-animated">&amp; Minifier</span>
            </h1>

            <p class="text-md font-medium text-slate-600">
                Beautify messy JSON, catch syntax errors with exact positions, or minify and compress
                JSON to reduce file size. Everything runs locally in your browser — your data is never
                uploaded, so it’s safe for API keys, configs and production payloads.
            </p>
        </div>
    </div>
</section>

<!-- Tool -->
<section class="bg-white py-10 sm:py-14" aria-label="JSON formatter tool">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4">

        <!-- Controls -->
        <div class="flex flex-wrap items-center gap-2">
            <button type="button" id="jf-format" class="btn btn-primary btn-radius-pill cursor-pointer">Format / Beautify</button>
            <button type="button" id="jf-minify" class="btn btn-accent btn-radius-pill cursor-pointer">Minify / Compress</button>
            <button type="button" id="jf-validate" class="btn btn-primary-outline btn-radius-pill cursor-pointer">Validate</button>

            <span class="mx-1 hidden h-6 w-px bg-slate-200 sm:block" aria-hidden="true"></span>

            <label for="jf-indent" class="text-xs font-medium text-slate-600">Indent</label>
            <select id="jf-indent" class="rounded-lg border border-slate-300 bg-white px-2 py-1.5 text-xs font-medium text-slate-700">
                <option value="2" selected>2 spaces</option>
                <option value="4">4 spaces</option>
                <option value="tab">Tab</option>
            </select>

            <span class="mx-1 hidden h-6 w-px bg-slate-200 sm:block" aria-hidden="true"></span>

            <button type="button" id="jf-sample" class="cursor-pointer rounded-pill border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:border-slate-400 hover:text-slate-900">Load sample</button>
            <button type="button" id="jf-copy" class="cursor-pointer rounded-pill border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:border-slate-400 hover:text-slate-900">Copy output</button>
            <button type="button" id="jf-download" class="cursor-pointer rounded-pill border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:border-slate-400 hover:text-slate-900">Download .json</button>
            <button type="button" id="jf-clear" class="cursor-pointer rounded-pill border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:border-slate-400 hover:text-slate-900">Clear</button>
        </div>

        <!-- Status line -->
        <div id="jf-status" class="hidden rounded-xl border px-4 py-3 text-[13px] font-medium" role="status" aria-live="polite"></div>

        <!-- Editor panes -->
        <div class="grid gap-4 lg:grid-cols-2">
            <div class="space-y-1.5">
                <label for="jf-input" class="text-xs font-semibold uppercase tracking-wide text-slate-500">Input JSON</label>
                <textarea
                    id="jf-input"
                    spellcheck="false"
                    autocomplete="off"
                    placeholder='Paste your JSON here, e.g. {"name":"QalbIT","projects":120}'
                    class="h-[420px] w-full resize-y rounded-2xl border border-slate-300 bg-slate-50 p-4 font-mono text-[13px] leading-relaxed text-slate-800 shadow-inner focus:border-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-200"
                ></textarea>
                <p id="jf-input-stats" class="text-[11px] text-slate-500">0 characters</p>
            </div>

            <div class="space-y-1.5">
                <label for="jf-output" class="text-xs font-semibold uppercase tracking-wide text-slate-500">Output</label>
                <textarea
                    id="jf-output"
                    spellcheck="false"
                    readonly
                    placeholder="Formatted or minified JSON appears here…"
                    class="h-[420px] w-full resize-y rounded-2xl border border-slate-300 bg-white p-4 font-mono text-[13px] leading-relaxed text-slate-800 focus:border-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-200"
                ></textarea>
                <p id="jf-output-stats" class="text-[11px] text-slate-500">&nbsp;</p>
            </div>
        </div>

        <p class="text-[12px] text-slate-500">
            Privacy: this tool is fully client-side. Your JSON never leaves your browser — no uploads, no logging, no size limits beyond your device’s memory.
        </p>
    </div>
</section>

<!-- SEO copy + internal links -->
<section class="bg-slate-50 py-12 sm:py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 grid gap-8 lg:grid-cols-3">
        <div class="space-y-2">
            <h2 class="text-base font-bold text-slate-900">Format &amp; beautify JSON</h2>
            <p class="text-[13px] leading-relaxed text-slate-600">
                Turn single-line or messy JSON into a readable, indented structure with 2 spaces, 4 spaces
                or tabs. Perfect for reviewing API responses, config files and logs.
            </p>
        </div>
        <div class="space-y-2">
            <h2 class="text-base font-bold text-slate-900">Validate with exact errors</h2>
            <p class="text-[13px] leading-relaxed text-slate-600">
                Invalid JSON? The validator pinpoints the error with line and column numbers — trailing
                commas, missing quotes, unescaped characters — so you can fix it in seconds.
            </p>
        </div>
        <div class="space-y-2">
            <h2 class="text-base font-bold text-slate-900">Minify &amp; reduce file size</h2>
            <p class="text-[13px] leading-relaxed text-slate-600">
                Strip whitespace to compress JSON for production payloads and configs. The size badge
                shows exactly how many bytes and what percentage you saved.
            </p>
        </div>
    </div>
</section>

<!-- Soft CTA -->
<section class="bg-white py-12">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 rounded-3xl border border-slate-200 bg-gradient-to-r from-slate-50 to-white p-7 sm:flex-row sm:items-center sm:justify-between">
            <div class="max-w-2xl space-y-1">
                <h2 class="text-lg font-bold text-slate-900">Working with APIs all day?</h2>
                <p class="text-[13px] text-slate-600">
                    QalbIT designs and builds production-grade REST APIs, backends and integrations for
                    web and mobile products — the systems behind the JSON.
                </p>
            </div>
            <div class="flex shrink-0 flex-wrap gap-3">
                <a href="<?= route_url('/services/backend-development/') ?>" class="btn btn-primary btn-radius-pill whitespace-nowrap">Backend &amp; API development</a>
                <a href="<?= route_url('/hire-developers/') ?>" class="btn btn-primary-outline btn-radius-pill whitespace-nowrap">Hire developers</a>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    'use strict';

    var input   = document.getElementById('jf-input');
    var output  = document.getElementById('jf-output');
    var status  = document.getElementById('jf-status');
    var inStats = document.getElementById('jf-input-stats');
    var outStats= document.getElementById('jf-output-stats');
    var indentEl= document.getElementById('jf-indent');

    function bytes(str) { return new Blob([str]).size; }

    function fmtBytes(n) {
        if (n < 1024) return n + ' B';
        if (n < 1048576) return (n / 1024).toFixed(1) + ' KB';
        return (n / 1048576).toFixed(2) + ' MB';
    }

    function setStatus(kind, msg) {
        status.classList.remove('hidden', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-800', 'border-red-200', 'bg-red-50', 'text-red-800');
        if (kind === 'ok') {
            status.classList.add('border-emerald-200', 'bg-emerald-50', 'text-emerald-800');
        } else {
            status.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
        }
        status.textContent = msg;
    }

    function errorPosition(src, err) {
        var m = /position (\d+)/.exec(err.message || '');
        if (!m) return err.message || 'Invalid JSON.';
        var pos = parseInt(m[1], 10);
        var before = src.slice(0, pos);
        var line = before.split('\n').length;
        var col = pos - before.lastIndexOf('\n');
        return (err.message || 'Invalid JSON') + ' → line ' + line + ', column ' + col + '.';
    }

    function getIndent() {
        var v = indentEl.value;
        return v === 'tab' ? '\t' : parseInt(v, 10);
    }

    function updateInputStats() {
        inStats.textContent = input.value.length.toLocaleString() + ' characters · ' + fmtBytes(bytes(input.value));
    }

    function run(mode) {
        var src = input.value.trim();
        if (src === '') { setStatus('err', 'Paste some JSON first.'); return; }
        try {
            var parsed = JSON.parse(src);
            var result = mode === 'minify'
                ? JSON.stringify(parsed)
                : JSON.stringify(parsed, null, getIndent());

            if (mode === 'validate') {
                setStatus('ok', 'Valid JSON ✓ — ' + fmtBytes(bytes(src)) + ', parses cleanly.');
                return;
            }

            output.value = result;
            var inB = bytes(src), outB = bytes(result);
            var diff = inB - outB;
            var pct  = inB > 0 ? Math.round((Math.abs(diff) / inB) * 100) : 0;
            outStats.textContent = fmtBytes(outB) + (mode === 'minify' && diff > 0
                ? ' · saved ' + fmtBytes(diff) + ' (' + pct + '% smaller)'
                : '');
            setStatus('ok', mode === 'minify' ? 'Minified successfully.' : 'Formatted successfully.');
        } catch (e) {
            setStatus('err', errorPosition(src, e));
        }
    }

    document.getElementById('jf-format').addEventListener('click',  function () { run('format'); });
    document.getElementById('jf-minify').addEventListener('click',  function () { run('minify'); });
    document.getElementById('jf-validate').addEventListener('click', function () { run('validate'); });

    document.getElementById('jf-sample').addEventListener('click', function () {
        input.value = JSON.stringify({
            company: 'QalbIT Infotech',
            location: { city: 'Ahmedabad', country: 'India' },
            services: ['Custom Software', 'CRM Development', 'ERP Development', 'MVP Development'],
            stats: { years: 12, projects: 120, clients: 90 },
            hiring: true
        });
        updateInputStats();
        run('format');
    });

    document.getElementById('jf-copy').addEventListener('click', function () {
        if (!output.value) { setStatus('err', 'Nothing to copy yet — format or minify first.'); return; }
        navigator.clipboard.writeText(output.value).then(function () {
            setStatus('ok', 'Output copied to clipboard.');
        }, function () {
            output.select();
            document.execCommand('copy');
            setStatus('ok', 'Output copied to clipboard.');
        });
    });

    document.getElementById('jf-download').addEventListener('click', function () {
        if (!output.value) { setStatus('err', 'Nothing to download yet — format or minify first.'); return; }
        var blob = new Blob([output.value], { type: 'application/json' });
        var a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'formatted.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(a.href);
    });

    document.getElementById('jf-clear').addEventListener('click', function () {
        input.value = '';
        output.value = '';
        outStats.innerHTML = '&nbsp;';
        status.classList.add('hidden');
        updateInputStats();
        input.focus();
    });

    input.addEventListener('input', updateInputStats);
    updateInputStats();
})();
</script>
