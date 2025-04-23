// Simple PJAX (PushState + AJAX) navigation for Laravel Blade
// This script intercepts navbar link clicks and loads content into #app (main container)
// Note: This is a quick solution and may not work for all Blade features (e.g., scripts, some forms)

document.addEventListener('DOMContentLoaded', function () {
    const mainContainer = document.getElementById('pjax-content'); // Target the main content wrapper
    if (!mainContainer) return;

    // Only intercept clicks on navbar links
    document.querySelectorAll('.navbar .nav-link').forEach(link => {
        link.addEventListener('click', function (e) {
            // Only intercept left-clicks, and not for external links
            if (
                this.target === '_blank' ||
                this.href.startsWith('mailto:') ||
                this.href.startsWith('tel:') ||
                this.href.indexOf(window.location.host) === -1
            ) {
                return;
            }
            e.preventDefault();
            const url = this.href;
            // Show loading state (optional)
            mainContainer.style.opacity = 0.5;
            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(response => response.text())
                .then(html => {
                    // Try to extract #app content from the response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContent = doc.getElementById('app');
                    if (newContent) {
                        mainContainer.innerHTML = newContent.innerHTML;
                        window.history.pushState({}, '', url);
                        mainContainer.style.opacity = 1;
                        // Optionally, re-run scripts or re-activate listeners here
                    } else {
                        // Fallback: full page reload
                        window.location.href = url;
                    }
                })
                .catch(() => {
                    window.location.href = url;
                });
        });
    });

    // Handle browser back/forward
    window.addEventListener('popstate', function () {
        fetch(window.location.href, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.getElementById('app');
                if (newContent) {
                    mainContainer.innerHTML = newContent.innerHTML;
                } else {
                    window.location.reload();
                }
            });
    });
});
