import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [

        laravel({
            input: [
                // Core files
                'resources/css/app.css',
                'resources/js/app.js',

                // Main CSS files
                'resources/css/main-css/home.css',
                'resources/css/main-css/membershippage.css',
                'resources/css/main-css/editprofile.css',
                'resources/css/main-css/eventcatalog.css',
                'resources/css/main-css/files.css',
                'resources/css/main-css/eventpages.css',
'resources/css/main-css/eventregispage.css',
                'resources/css/main-css/aboutpage.css',

                
                // Main JS files
                'resources/js/main-js/home.js',
                'resources/js/main-js/editprofile.js',
                'resources/js/main-js/files.js',
                'resources/js/main-js/eventpages.js',
'resources/js/main-js/eventregispage.js',

                
                // Admin CSS files
                'resources/css/admin-css/db_overview.css',
                'resources/css/admin-css/db_users.css',
                'resources/css/admin-css/db_programs.css',
                // Draft Programs CSS (reuse programs CSS for now)
                'resources/css/admin-css/db_programs.css', // For drafts page

                
                // Admin JS files
                'resources/js/admin-js/db_users.js',
                'resources/js/admin-js/db_newprogram_upload.js',
                // Draft Programs JS (reuse users or add new if needed)
                // 'resources/js/admin-js/db_draftprog.js',

                
                // Chart JS files
                'resources/js/charts/totalevents.js',
                'resources/js/charts/regularmember.js',
                'resources/js/charts/partnergroups.js',
                
                // Auth CSS files
                'resources/css/auth-css/register.css',
                'resources/css/auth-css/login.css',
                
                // Partials CSS files
                'resources/css/partials-css/navbar.css',
                'resources/css/partials-css/footer.css', 
                'resources/css/partials-css/admin_sidebar.css',
                
                // Partials JS files
                'resources/js/partials-js/navbar.js',
                'resources/js/partials-js/footer.js',
                // Blade views for Vite hot reload
                // Removed .blade.php files from input array. If you want hot reload for Blade files, use the 'refresh' option only.
                
                // Commented files for reference
                // 'resources/css/announcement_tab.css',
                // 'resources/js/announcement_tab.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
