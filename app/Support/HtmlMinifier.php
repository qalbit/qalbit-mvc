<?php

declare(strict_types=1);

namespace App\Support;

class HtmlMinifier
{
    /**
     * Advanced HTML minification.
     *
     * Safe by default:
     * - Preserves content of <script>, <style>, <pre>, <textarea>
     * - Keeps IE conditional / KO / Google comments
     * - Removes other comments
     * - Removes indentation before tags
     * - Collapses whitespace between tags
     * - Compacts tags & attributes (outside quotes)
     *
     * If $aggressive = true:
     * - Also collapses remaining newlines / tabs and multiple spaces
     *   outside the protected blocks. This can slightly alter the
     *   literal whitespace in text nodes (visually it’s usually safe).
     */
    public static function minify(string $html, bool $aggressive = false): string
    {
        if ($html === '') {
            return $html;
        }

        $placeholders = [];
        $index        = 0;

        // 1) Protect blocks where whitespace is semantically important
        //    or that may contain JS/CSS we don't want to touch here.
        $html = preg_replace_callback(
            '#<(script|style|pre|textarea)\b[^>]*>.*?</\1>#is',
            function (array $matches) use (&$placeholders, &$index): string {
                $key = '___HTMLMIN_BLOCK_' . $index++ . '___';
                $placeholders[$key] = $matches[0];

                return $key;
            },
            $html
        );

        // 2) Remove HTML comments except:
        //    - conditional comments <!--[if IE]> ... <![endif]-->
        //    - KO bindings <!-- ko --> / <!-- /ko -->
        //    - some Google-style markers <!--googleoff: all-->
        $html = preg_replace(
            '~<!--(?!\[if|\s*<!|\s*>|\s*\/?ko|google\-|\/google\-)[\s\S]*?-->~i',
            '',
            $html
        );

        // 3) Remove indentation before tags at line start
        //    e.g. "    <div>" → "<div>"
        $html = preg_replace('~^[ \t]+(?=<)~m', '', $html);

        // 4) Remove whitespace between tags only
        //    e.g. "</div>\n   <div>" → "</div><div>"
        $html = preg_replace('~>\s+<~', '><', $html);

        // 5) Compact individual tags (attributes, spaces, boolean attrs)
        $html = preg_replace_callback(
            '~<[^!?][^>]*>~',
            [self::class, 'minifyTag'],
            $html
        );

        // 6) Optional more aggressive whitespace squeezing
        if ($aggressive) {
            // Replace line breaks & tabs with spaces
            $html = preg_replace('~[\r\n\t]+~', ' ', $html);
            // Collapse 2+ spaces into a single space
            // (Protected blocks are still placeholders at this point)
            $html = preg_replace('~ {2,}~', ' ', $html);
        }

        $html = trim($html);

        // 7) Restore protected blocks exactly as they were
        if (!empty($placeholders)) {
            $html = strtr($html, $placeholders);
        }

        return $html;
    }

    /**
     * Minify a single tag:
     * - Collapses redundant whitespace outside quotes to single spaces
     * - Tightens spaces around "="
     * - Simplifies boolean attributes (disabled="disabled" → disabled)
     * - Removes redundant type="text/javascript" / type="text/css"
     */
    private static function minifyTag(array $matches): string
    {
        $tag = $matches[0];

        // Skip doctype, XML declarations and comments
        if (strpos($tag, '<!') === 0 || strpos($tag, '<?') === 0 || strpos($tag, '<!--') === 0) {
            return $tag;
        }

        // Closing tags: just trim extra spaces before ">"
        if (isset($tag[1]) && $tag[1] === '/') {
            return preg_replace('~\s+>~', '>', $tag);
        }

        // Opening / self-closing tag
        $inner = substr($tag, 1, -1); // strip "<" and ">"
        $inner = (string) $inner;

        if ($inner === '') {
            return $tag;
        }

        // Split on quoted strings so we never touch whitespace inside quotes
        $parts = preg_split('~(".*?"|\'.*?\')~s', $inner, -1, PREG_SPLIT_DELIM_CAPTURE);

        if ($parts === false) {
            // Fallback: at least tighten "=" and ">" if split fails
            $tag = preg_replace('~\s*=\s*~', '=', $tag);
            $tag = preg_replace('~\s+>~', '>', $tag);

            return $tag;
        }

        $result = '';

        foreach ($parts as $index => $part) {
            if ($index % 2 === 1) {
                // Quoted string (attribute value) – leave exactly as is
                $result .= $part;
            } else {
                // Outside quotes: collapse runs of whitespace to a single space
                // e.g. "div   class" → "div class"
                $part   = preg_replace('~\s+~', ' ', $part);
                $result .= $part;
            }
        }

        $result = trim((string) $result);

        // Tighten spaces around "="
        // e.g. 'class = "btn"' → 'class="btn"'
        $result = preg_replace('~\s*=\s*~', '=', $result);

        // Simplify common boolean attributes:
        // disabled="disabled" → disabled, checked="checked" → checked, etc.
        $result = preg_replace(
            '~\s+\b(disabled|checked|selected|readonly|required|multiple|autofocus|novalidate|formnovalidate)\s*=\s*(["\'])?\1\2~i',
            ' $1',
            $result
        );

        // Remove redundant type attributes for script / style tags:
        // type="text/javascript" / type="text/css"
        $result = preg_replace(
            '~\s+type=("|\')(text/javascript|text/css)\1~i',
            '',
            $result
        );

        // Remove space before "/>" in self-closing tags
        // e.g. '<img ... />' → '<img .../>'
        $result = preg_replace('~\s+\/$~', '/', $result);

        return '<' . $result . '>';
    }
}
