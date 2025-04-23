# cylcentral Project

## Overview

This project is a Laravel application utilizing Vite for asset management and Tailwind CSS for styling. The structure is organized to facilitate easy navigation and maintenance of CSS and JavaScript files across different modules.

## Folder Structure

```
cylcentral
├── app
│   ├── Http
│   │   └── Controllers
│   └── Models
├── resources
│   ├── css
│   │   ├── app.css
│   │   ├── auth
│   │   │   ├── login.css
│   │   │   └── register.css
│   │   ├── admin
│   │   │   ├── dashboard-analytics.css
│   │   │   └── sidebar.css
│   │   ├── events
│   │   │   ├── catalog.css
│   │   │   └── event-pages.css
│   │   ├── members
│   │   │   ├── membership-page.css
│   │   │   └── edit-profile.css
│   │   ├── files
│   │   │   └── files.css
│   │   ├── home
│   │   │   ├── home.css
│   │   │   └── about-page.css
│   │   └── shared
│   │       ├── navbar.css
│   │       └── footer.css
│   ├── js
│   │   ├── app.js
│   │   ├── auth
│   │   │   └── auth.js
│   │   ├── admin
│   │   │   ├── dashboard-user.js
│   │   │   └── charts
│   │   │       ├── total-events.js
│   │   │       ├── regular-member.js
│   │   │       └── partner-groups.js
│   │   ├── events
│   │   │   └── event-pages.js
│   │   ├── members
│   │   │   └── edit-profile.js
│   │   ├── files
│   │   │   └── files.js
│   │   └── home
│   │       └── home.js
│   ├── views
│   │   └── layouts
├── public
├── vite.config.js
├── tailwind.config.js
└── README.md
```

## Asset Links

In your Blade files, ensure to use the `@vite()` directive for linking assets. Here are the updated asset links:

### CSS Links

```blade
<link rel="stylesheet" href="{{ @vite('resources/css/app.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/auth/login.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/auth/register.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/admin/dashboard-analytics.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/admin/sidebar.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/events/catalog.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/events/event-pages.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/members/membership-page.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/members/edit-profile.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/files/files.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/home/home.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/home/about-page.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/shared/navbar.css') }}">
<link rel="stylesheet" href="{{ @vite('resources/css/shared/footer.css') }}">
```

### JS Links

```blade
<script src="{{ @vite('resources/js/app.js') }}"></script>
<script src="{{ @vite('resources/js/auth/auth.js') }}"></script>
<script src="{{ @vite('resources/js/admin/dashboard-user.js') }}"></script>
<script src="{{ @vite('resources/js/admin/charts/total-events.js') }}"></script>
<script src="{{ @vite('resources/js/admin/charts/regular-member.js') }}"></script>
<script src="{{ @vite('resources/js/admin/charts/partner-groups.js') }}"></script>
<script src="{{ @vite('resources/js/events/event-pages.js') }}"></script>
<script src="{{ @vite('resources/js/members/edit-profile.js') }}"></script>
<script src="{{ @vite('resources/js/files/files.js') }}"></script>
<script src="{{ @vite('resources/js/home/home.js') }}"></script>
<script src="{{ @vite('resources/js/shared/navbar.js') }}"></script>
<script src="{{ @vite('resources/js/shared/footer.js') }}"></script>
```

## Vite Configuration

Ensure your `vite.config.js` is updated to reflect the new paths. Here is a sample configuration:

```javascript
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
```

## Final Steps

To run the application, use the following commands:

1. `php artisan serve`
2. `npm run dev`

This will ensure your application loads correctly with the updated structure and asset links.