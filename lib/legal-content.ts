import fs from "fs";
import path from "path";

export function readLegalHtml(page: string): string | null {
  const filePath = path.join(
    process.cwd(),
    "components/legacy-html/legal",
    `${page}.html`,
  );

  if (!fs.existsSync(filePath)) {
    return null;
  }

  const html = fs.readFileSync(filePath, "utf8").trim();
  return html || null;
}
