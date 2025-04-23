// Toast notification logic
window.showCustomToast = function(message) {
    let toast = document.querySelector('.custom-toast');
    if (!toast) {
        toast = document.createElement('div');
        toast.className = 'custom-toast';
        toast.innerHTML = `
            <span class="toast-icon" style="color: #22c55e; margin-right: 14px; font-size: 1.7em;">
                <i class="fa fa-check-circle"></i>
            </span>
            <span class="toast-message"></span>
            <button class="toast-close" aria-label="Close">&times;</button>
        `;
        document.body.appendChild(toast);
    }
    toast.querySelector('.toast-message').textContent = message || 'Login successful!';
    toast.style.display = 'flex';
    toast.classList.remove('toast-hide');
    setTimeout(() => toast.classList.add('toast-show'), 10);
    // Auto-hide after 4 seconds
    if (toast.hideTimeout) clearTimeout(toast.hideTimeout);
    toast.hideTimeout = setTimeout(() => hideToast(toast), 4000);
    toast.querySelector('.toast-close').onclick = () => hideToast(toast);
};

function hideToast(toast) {
    toast.classList.remove('toast-show');
    toast.classList.add('toast-hide');
    setTimeout(() => {
        toast.style.display = 'none';
    }, 350);
}
