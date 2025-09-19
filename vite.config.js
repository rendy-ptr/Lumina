import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: {
                paths: ["app/**", "resources/views/**", "routes/**"],
                delay: 100,
                events: ["*"],
            },
        }),
        tailwindcss(),
    ],
    server: {
        hmr: {
            host: "localhost",
            protocol: "ws",
        },
        watch: {
            usePolling: false,
        },
        // Optimasi server
        strictPort: false,
        port: 5173,
    },
    // Optimasi build
    build: {
        rollupOptions: {
            external: [],
        },
    },
    // Optimasi caching
    optimizeDeps: {
        include: [],
    },
});
