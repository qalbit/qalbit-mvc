export function cn(...classes: (string | false | null | undefined)[]): string {
  return classes.filter(Boolean).join(" ");
}

export function stripHtml(html: string): string {
  return html.replace(/<[^>]*>/g, "").trim();
}

export function sanitizeText(input: string, maxLength = 500): string {
  return input.replace(/[<>"']/g, "").trim().slice(0, maxLength);
}
