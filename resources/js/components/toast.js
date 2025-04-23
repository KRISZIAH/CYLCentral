window.showCustomToast = function(message = 'Login successful!') {
    const toast = document.getElementById('custom-toast');
    if (!toast) return;
    toast.querySelector('.toast-message').textContent = message;
    toast.style.display = 'flex';
    toast.classList.remove('hide-toast');
    setTimeout(() => {
        if (!toast.classList.contains('hide-toast')) {
            toast.classList.add('hide-toast');
            setTimeout(() => { toast.style.display = 'none'; }, 400);
        }
    }, 4000); // Auto-hide after 4s
}

document.addEventListener('DOMContentLoaded', function() {
    const closeBtn = document.querySelector('.toast-close');
    if (closeBtn) {
        closeBtn.onclick = function() {
            const toast = document.getElementById('custom-toast');
            toast.classList.add('hide-toast');
            setTimeout(() => { toast.style.display = 'none'; }, 400);
        };
    }
});
