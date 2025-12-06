const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./resources/views/**/*.php",
        "./resources/js/**/*.js",
        "./public/**/*.php",
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1.25rem",
                lg: "2rem",
            },
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1200px",
                "2xl": "1320px",
            }
        },
        extend: {
            // Typography
            fontFamily: {
                // Body text
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                // Headlines / hero
                display: ["Poppins", ...defaultTheme.fontFamily.sans],
                // Code, badges, tech stack labels
                mono: ["JetBrains Mono", ...defaultTheme.fontFamily.mono],
            },
            fontSize: {
                // Display sizes for hero & big headings
                "display-2xl": ["3.25rem", { lineHeight: "1.2", letterSpacing: "-0.06em" }],
                "display-xl": ["2.75rem", { lineHeight: "1.05", letterSpacing: "-0.05em" }],
                "display-lg": ["2.25rem", { lineHeight: "1.3", letterSpacing: "-0.04em" }],
                "display-md": ["1.875rem", { lineHeight: "1.4", letterSpacing: "-0.03em" }],
                "display-sm": ["1.5rem", { lineHeight: "1.5", letterSpacing: "-0.02em" }],
                // Small uppercase labels
                "label-sm": ["0.75rem", { lineHeight: "1.2", letterSpacing: "0.08em" }],
            },

            // Semantic color tokens + brand palettes
            colors: {
                border: "hsl(var(--border))",
                input: "hsl(var(--input))",
                ring: "hsl(var(--ring))",

                background: "hsl(var(--background))",
                foreground: "hsl(var(--foreground))",

                muted: {
                    DEFAULT: "hsl(var(--muted))",
                    foreground: "hsl(var(--muted-foreground))",
                },
                
                card: {
                    DEFAULT: "hsl(var(--card))",
                    foreground: "hsl(var(--card-foreground))",
                },

                primary: {
                    // semantic
                    DEFAULT: "hsl(var(--primary))",
                    foreground: "hsl(var(--primary-foreground))",
                    // brand scale
                    50:  "#edf8ff",
                    100: "#d6efff",
                    200: "#b5e4ff",
                    300: "#83d5ff",
                    400: "#48bcff",
                    500: "#1e9aff",
                    600: "#067aff",
                    700: "#0066ff", // main brand
                    800: "#084ec5",
                    900: "#0d469b",
                    950: "#0e2b5d",
                },

                secondary: {
                    DEFAULT: "hsl(var(--secondary))",
                    foreground: "hsl(var(--secondary-foreground))",
                },

                accent: {
                    // semantic
                    DEFAULT: "hsl(var(--accent))",
                    foreground: "hsl(var(--accent-foreground))",
                    // accent scale
                    50:  "#f0f2fd",
                    100: "#e4e7fb",
                    200: "#ced2f7",
                    300: "#b1b7f0",
                    400: "#9191e8",
                    500: "#7c76de",
                    600: "#6c5ccf",
                    700: "#5d4cb6",
                    800: "#50439b", // main accent
                    900: "#403976",
                    950: "#272244",
                },

                destructive: {
                    DEFAULT: "hsl(var(--destructive))",
                    foreground: "hsl(var(--destructive-foreground))",
                },

                success: {
                    DEFAULT: "hsl(var(--success))",
                    foreground: "hsl(var(--success-foreground))",
                },

                warning: {
                    DEFAULT: "hsl(var(--warning))",
                    foreground: "hsl(var(--warning-foreground))",
                },

                // Optional: keep brand alias mapped to primary scale if you want
                brand: {
                    50:  "#edf8ff",
                    100: "#d6efff",
                    200: "#b5e4ff",
                    300: "#83d5ff",
                    400: "#48bcff",
                    500: "#1e9aff",
                    600: "#067aff",
                    700: "#0066ff",
                    800: "#084ec5",
                    900: "#0d469b",
                },
            },

            // Gradients using your palette
            backgroundImage: {
                "gradient-primary":
                    "linear-gradient(135deg, #48bcff 0%, #0066ff 45%, #0e2b5d 100%)",
                "gradient-accent":
                    "linear-gradient(135deg, #9191e8 0%, #50439b 45%, #272244 100%)",
                "gradient-brand":
                    "linear-gradient(135deg, #0066ff 0%, #7c76de 50%, #48bcff 100%)",
            },

            // Radius & shadows
            borderRadius: {
                lg: "var(--radius)",                // default card radius
                md: "calc(var(--radius) - 2px)",    // inputs, smaller chips
                sm: "calc(var(--radius) - 4px)",
                xs: "calc(var(--radius) - 8px)",
                xl: "calc(var(--radius) + 4px)",    // hero cards, modals
                "2xl": "calc(var(--radius) + 8px)", // fixed typo
                pill: "calc(var(--radius) + 999px)",
            },
            boxShadow: {
                soft: "0 10px 25px rgba(15, 23, 42, 0.06)",
                elevated: "0 18px 45px rgba(15, 23, 42, 0.12)",
                "inner-card": "inset 0 0 0 1px rgba(148, 163, 184, 0.18)",
            },

            // Extra spacing tokens
            spacing: {
                18: "4.5rem",
                22: "5.5rem",
            },
        },
    },
    plugins: [],
};
