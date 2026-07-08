import type { Config } from "tailwindcss";
import defaultTheme from "tailwindcss/defaultTheme";

const config: Config = {
  content: [
    "./app/**/*.{js,ts,jsx,tsx,mdx}",
    "./components/**/*.{js,ts,jsx,tsx,mdx}",
    "./lib/**/*.{js,ts,jsx,tsx}",
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
      },
    },
    extend: {
      fontFamily: {
        sans: ["var(--font-poppins)", "Poppins", ...defaultTheme.fontFamily.sans],
        display: ["var(--font-poppins)", "Poppins", ...defaultTheme.fontFamily.sans],
        mono: ["JetBrains Mono", ...defaultTheme.fontFamily.mono],
      },
      fontSize: {
        "display-2xl": ["3.25rem", { lineHeight: "1.2", letterSpacing: "-0.06em" }],
        "display-xl": ["2.75rem", { lineHeight: "1.05", letterSpacing: "-0.05em" }],
        "display-lg": ["2.25rem", { lineHeight: "1.3", letterSpacing: "-0.04em" }],
        "display-md": ["1.875rem", { lineHeight: "1.4", letterSpacing: "-0.03em" }],
        "display-sm": ["1.5rem", { lineHeight: "1.5", letterSpacing: "-0.02em" }],
        md: ["1rem", { lineHeight: "1.5" }],
        "label-sm": ["0.75rem", { lineHeight: "1.2", letterSpacing: "0.08em" }],
      },
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
          DEFAULT: "hsl(var(--primary))",
          foreground: "hsl(var(--primary-foreground))",
          50: "#edf8ff",
          100: "#d6efff",
          200: "#b5e4ff",
          300: "#83d5ff",
          400: "#48bcff",
          500: "#1e9aff",
          600: "#067aff",
          700: "#0066ff",
          800: "#084ec5",
          900: "#0d469b",
          950: "#0e2b5d",
        },
        secondary: {
          DEFAULT: "hsl(var(--secondary))",
          foreground: "hsl(var(--secondary-foreground))",
        },
        accent: {
          DEFAULT: "hsl(var(--accent))",
          foreground: "hsl(var(--accent-foreground))",
          50: "#f0f2fd",
          100: "#e4e7fb",
          200: "#ced2f7",
          300: "#b1b7f0",
          400: "#9191e8",
          500: "#7c76de",
          600: "#6c5ccf",
          700: "#5d4cb6",
          800: "#50439b",
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
        brand: {
          50: "#edf8ff",
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
      backgroundImage: {
        "gradient-primary":
          "linear-gradient(135deg, #48bcff 0%, #0066ff 45%, #0e2b5d 100%)",
        "gradient-accent":
          "linear-gradient(135deg, #9191e8 0%, #50439b 45%, #272244 100%)",
        "gradient-brand":
          "linear-gradient(135deg, #0066ff 0%, #7c76de 50%, #48bcff 100%)",
      },
      borderRadius: {
        lg: "var(--radius)",
        md: "calc(var(--radius) - 2px)",
        sm: "calc(var(--radius) - 4px)",
        xs: "calc(var(--radius) - 8px)",
        xl: "calc(var(--radius) + 4px)",
        "2xl": "calc(var(--radius) + 8px)",
        pill: "calc(var(--radius) + 999px)",
      },
      boxShadow: {
        soft: "0 10px 25px rgba(15, 23, 42, 0.06)",
        elevated: "0 18px 45px rgba(15, 23, 42, 0.12)",
        "inner-card": "inset 0 0 0 1px rgba(148, 163, 184, 0.18)",
      },
      spacing: {
        18: "4.5rem",
        22: "5.5rem",
      },
    },
  },
  plugins: [],
};

export default config;
