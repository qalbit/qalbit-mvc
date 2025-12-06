const esbuild = require("esbuild");

const isProd = process.env.NODE_ENV === "production";

// Adjust these lists to match the actual files you have
const jsEntryPoints = [
    "resources/js/aboutus.js",
    "resources/js/careers.js",
    "resources/js/casestudy-detail.js",
    "resources/js/contactus.js",
    "resources/js/hire-developer.js",
    "resources/js/home.js",
    "resources/js/industries.js",
    "resources/js/industry-detail.js",
    "resources/js/location-detail.js",
    "resources/js/main.js",
    "resources/js/process-detail.js",
    "resources/js/service-detail.js",
    "resources/js/services.js",
    "resources/js/technologies.js",
    "resources/js/technology-detail.js",
];

const cssEntryPoints = [
    "resources/css/home.css",
    "resources/css/industries.css",
    "resources/css/services.css",
    "resources/css/technologies.css",
];

async function buildJs() {
    if (!jsEntryPoints.length) return;

    await esbuild.build({
        entryPoints: jsEntryPoints,
        outdir: "public/assets/js",
        bundle: false,
        minify: isProd,
        sourcemap: !isProd,
        target: ["es2018"],
        format: "iife",
        logLevel: "info",
    });
}

async function buildCss() {
    if (!cssEntryPoints.length) return;

    await esbuild.build({
        entryPoints: cssEntryPoints,
        outdir: "public/assets/css",
        bundle: false,
        minify: isProd,
        sourcemap: !isProd,
        logLevel: "info",
        loader: { ".css": "css" },
    });
}

Promise.all([buildJs(), buildCss()])
    .then(() => {
        console.log("Assets build complete.");
    })
    .catch((err) => {
        console.error(err);
        process.exit(1);
    });
