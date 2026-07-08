# apps/web scripts

## `convert-config.ts`

Exports PHP config arrays to `lib/data/*.json`. Run after PHP config changes:

```bash
npm run convert-config
```

## `render-legal-html.php`

Regenerates legal page HTML consumed by `LegalProsePage` (`components/legacy-html/legal/*.html`).

Run from `apps/web` when PHP legal templates change:

```bash
php scripts/render-legal-html.php
```

Other `render-*-html.php` scripts were removed after the React migration — pages are built from `lib/data` and React components.
