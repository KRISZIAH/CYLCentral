import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/home.css',
                'resources/css/membershippage.css',
                'resources/css/editprofile.css', 
                'resources/js/editprofile.js',
                'resources/css/eventcatalog.css',
                'resources/css/dashboard_analytics.css',
                'resources/js/charts/totalevents.js',
                'resources/js/charts/regularmember.js',
                'resources/js/charts/partnergroups.js',
                'resources/css/files.css',
                'resources/js/files.js',
                'resources/css/eventpages.css',
                'resources/js/eventpages.js',
                'resources/css/announcement_tab.css',
                'resources/js/announcement_tab.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
