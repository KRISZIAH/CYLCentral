import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/auth/login.css',
                'resources/css/auth/register.css',
                'resources/css/admin/dashboard-analytics.css',
                'resources/css/admin/sidebar.css',
                'resources/css/events/catalog.css',
                'resources/css/events/event-pages.css',
                'resources/css/members/membership-page.css',
                'resources/css/members/edit-profile.css',
                'resources/css/files/files.css',
                'resources/css/home/home.css',
                'resources/css/home/about-page.css',
                'resources/css/shared/navbar.css',
                'resources/css/shared/footer.css',
                'resources/js/auth/auth.js',
                'resources/js/admin/dashboard-user.js',
                'resources/js/admin/charts/total-events.js',
                'resources/js/admin/charts/regular-member.js',
                'resources/js/admin/charts/partner-groups.js',
                'resources/js/events/event-pages.js',
                'resources/js/members/edit-profile.js',
                'resources/js/files/files.js',
                'resources/js/home/home.js',
                'resources/js/shared/navbar.js',
                'resources/js/shared/footer.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});