# QalbIT Web (Next.js 14)

Marketing site migrated from PHP MVC. Deploy on VPS with Node.js ≥ 20, PM2, and nginx.

## Development

```bash
cp .env.example .env.local
npm install
npm run dev
```

Open http://localhost:3000

## Quality checks

```bash
npm run typecheck
npm run lint
npm run test          # Vitest unit tests (mappers)
SITE_URL=https://qalbit.com npm run build   # required for production build
npm run test:e2e      # Playwright smoke tests (build first)
```

CI runs typecheck, lint, unit tests, build, and E2E on PRs touching `apps/web/`.

## Production (VPS)

1. Copy `.env.example` to `.env.production` on the server (never commit secrets).
2. Set `INDEXING_ENABLED=true`, `SITE_URL=https://qalbit.com`, SMTP and Slack webhook.
3. Build and start:

```bash
npm ci
npm run build
pm2 start deploy/ecosystem.config.cjs --env production
```

4. Configure nginx using `deploy/nginx-qalbit.conf.sample` (blog Option A routing).

## Config data

PHP configs are exported to `lib/data/*.json`. Re-export after PHP config changes:

```bash
npm run convert-config
```

## Key paths

- Static assets: `public/assets/` (mirrors PHP `public/assets/`)
- API: `/api/contact/`, `/api/career/apply/`
- ISR revalidate: 900s (pages), 3600s (blog)
