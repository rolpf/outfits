import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import { readFileSync } from 'node:fs'
const host = 'outfits.traefik.me';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
    server: {
        host: host,
        // Create a certificate and put it in your ~/.certs folder
        // https://deliciousbrains.com/ssl-certificate-authority-for-local-https-development/
        https: {
            key: readFileSync('/home/quentinhnrt/certs/_wildcard.traefik.me+2-key.pem'),
            cert: readFileSync('/home/quentinhnrt/certs/_wildcard.traefik.me+2.pem'),
        }

    },
});
