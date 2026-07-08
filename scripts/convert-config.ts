/**
 * One-time PHP config → JSON exporter.
 * Run from repo root: php scripts/export-config.php
 * Or from apps/web: npm run convert-config (re-exports via PHP CLI).
 */
import { execSync } from "node:child_process";
import { existsSync } from "node:fs";
import path from "node:path";

const repoRoot = path.resolve(__dirname, "../../..");
const configDir = path.join(repoRoot, "config");
const outDir = path.join(__dirname, "../lib/data");

const exports: Record<string, string> = {
  services: "services.json",
  industries: "industries.json",
  technologies: "technologies.json",
  geo: "geo.json",
  hire: "hire.json",
  case_studies: "case_studies.json",
  process: "process.json",
  faqs: "faqs.json",
  portfolio: "portfolio.json",
  careers: "careers.json",
  navigation: "navigation.json",
  clients: "clients.json",
  reviews: "reviews.json",
  business: "business.json",
};

if (!existsSync(configDir)) {
  console.error("Config directory not found:", configDir);
  process.exit(1);
}

for (const [name, file] of Object.entries(exports)) {
  const phpFile = path.join(configDir, `${name}.php`);
  const outFile = path.join(outDir, file);
  const cmd = `php -r '$c=require "${phpFile}"; echo json_encode($c, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);' > "${outFile}"`;
  execSync(cmd, { cwd: repoRoot, stdio: "inherit" });
  console.log(`Exported ${name} → ${file}`);
}

console.log("Config conversion complete.");
