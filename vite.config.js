import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/main-css/home.css',
                'resources/css/main-css/membershippage.css',
                'resources/css/main-css/editprofile.css', 
                'resources/js/main-js/editprofile.js',
                'resources/css/main-css/eventcatalog.css',
                'resources/css/admin-css/dashboard_analytics.css',
                'resources/js/admin-js/dashboard_user.js',
                'resources/js/charts/totalevents.js',
                'resources/js/charts/regularmember.js',
                'resources/js/charts/partnergroups.js',
                'resources/css/main-css/files.css',
                'resources/js/main-js/files.js',
                'resources/css/main-css/eventpages.css',
                'resources/js/main-js/eventpages.js',
                'resources/js/partials-js/footer.js',
                'resources/css/partials-css/footer.css',
                // 'resources/css/announcement_tab.css',
                // 'resources/js/announcement_tab.js',
                'resources/css/auth-css/register.css',
                'resources/css/auth-css/login.css',
                'resources/css/partials-css/navbar.css',
                'resources/js/partials-js/navbar.js',
                'resources/css/partials-css/admin_sidebar.css',
                'resources/js/main-js/cordibot.js',
                'resources/css/main-css/cordibot.css',
                'resources/css/main-css/eventregis.css',
                'resources/js/main-js/eventregis.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});