import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: {
                paths: ["app/**", "resources/views/**", "routes/**"],
                delay: 300,
                events: ["*"],
            },
        }),
        tailwindcss(),
    ],
    server: {
        host: "0.0.0.0",
        port: 5173,
        strictPort: false,
        hmr: {
            host: "localhost",
            protocol: "ws",
            timeout: 60000,
            overlay: false,
        },
        watch: {
            usePolling: true,
            interval: 1000,
            ignored: [
                "**/node_modules/**",
                "**/storage/framework/views/**",
                "**/vendor/**",
                "**/.git/**",
            ],
        },
        timeout: 120000,
        headers: {
            "Access-Control-Allow-Origin": "*",
        },
    },
    build: {
        rollupOptions: {
            external: [],
            output: {
                manualChunks: undefined,
            },
        },
        chunkSizeWarningLimit: 1000,
        sourcemap: false,
    },
    optimizeDeps: {
        include: ["alpinejs"],
        exclude: ["@vite/client", "@vite/env"],
        force: false,
    },
    resolve: {
        alias: {
            "@": "/resources/js",
        },
    },
    define: {
        global: "globalThis",
    },
});
