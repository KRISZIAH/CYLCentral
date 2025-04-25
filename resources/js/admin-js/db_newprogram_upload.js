// Image upload logic for program logo upload box

document.addEventListener('DOMContentLoaded', function() {
    const logoBox = document.querySelector('.border-dashed');
    const uploadNote = logoBox.querySelector('.upload-note');
    const imageIcon = logoBox.querySelector('i');
    let fileInput = null;
    let progressBar = null;
    let cancelBtn = null;
    let uploadedImg = null;
    let removeImgBtn = null;
    let uploadXHR = null;

    // Helper to reset logo box to original state
    function resetLogoBox() {
        if (uploadedImg) uploadedImg.remove();
        if (removeImgBtn) removeImgBtn.remove();
        if (progressBar) progressBar.remove();
        if (cancelBtn) cancelBtn.remove();
        logoBox.innerHTML = '';
        // Image icon
        const icon = document.createElement('i');
        icon.className = 'bi bi-image fs-1';
        icon.style.color = 'var(--green1)';
        logoBox.appendChild(icon);
        // Upload label
        const uploadLabel = document.createElement('span');
        uploadLabel.textContent = 'Upload an image';
        uploadLabel.style.fontStyle = 'italic';
        uploadLabel.style.fontWeight = '500';
        uploadLabel.style.fontSize = '16px';
        uploadLabel.style.background = 'var(--gradient-green)';
        uploadLabel.style.webkitBackgroundClip = 'text';
        uploadLabel.style.webkitTextFillColor = 'transparent';
        uploadLabel.style.backgroundClip = 'text';
        uploadLabel.style.color = 'transparent';
        uploadLabel.style.lineHeight = '1.3';
        uploadLabel.className = 'd-block text-center';
        logoBox.appendChild(uploadLabel);
        logoBox.style.background = '';
        logoBox.classList.remove('uploaded');
    }

    // Create file input if not exists
    function ensureFileInput() {
        if (!fileInput) {
            fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = '.png';
            fileInput.style.display = 'none';
            fileInput.addEventListener('change', handleFileSelect);
            document.body.appendChild(fileInput);
        }
    }

    // Handle click on logo box
    logoBox.style.cursor = 'pointer';
    logoBox.addEventListener('click', function() {
        ensureFileInput();
        if (!logoBox.classList.contains('uploaded')) {
            fileInput.value = '';
            fileInput.click();
        }
    });

    // Handle file selection
    function handleFileSelect(e) {
        const file = e.target.files[0];
        if (!file) return;
        if (file.type !== 'image/png') {
            alert('Only PNG files are allowed.');
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            alert('File size exceeds 5MB.');
            return;
        }
        startUpload(file);
    }

    // Start upload (simulate with timeout if no backend)
    function startUpload(file) {
        // Remove previous UI
        if (progressBar) progressBar.remove();
        if (cancelBtn) cancelBtn.remove();
        logoBox.innerHTML = '';
        // Uploading file label
        const uploadingLabel = document.createElement('div');
        uploadingLabel.textContent = 'Uploading file';
        uploadingLabel.style.fontSize = '14px';
        uploadingLabel.style.fontWeight = '500';
        uploadingLabel.style.color = 'var(--green1)';
        uploadingLabel.style.marginBottom = '8px';
        uploadingLabel.style.textAlign = 'center';
        logoBox.appendChild(uploadingLabel);
        // Progress bar
        progressBar = document.createElement('div');
        progressBar.style.width = '90%';
        progressBar.style.margin = '20px auto 0 auto';
        progressBar.style.height = '8px';
        progressBar.style.background = '#eee';
        progressBar.style.borderRadius = '4px';
        progressBar.style.position = 'relative';
        // Progress inner
        const progressInner = document.createElement('div');
        progressInner.style.height = '100%';
        progressInner.style.width = '0%';
        progressInner.style.background = 'var(--green1)';
        progressInner.style.borderRadius = '4px';
        progressInner.style.transition = 'width 0.2s';
        progressBar.appendChild(progressInner);
        // Cancel button
        cancelBtn = document.createElement('button');
        cancelBtn.textContent = '✕';
        cancelBtn.title = 'Cancel upload';
        cancelBtn.style.position = 'absolute';
        cancelBtn.style.right = '10px';
        cancelBtn.style.top = '-25px';
        cancelBtn.style.background = 'none';
        cancelBtn.style.border = 'none';
        cancelBtn.style.fontSize = '18px';
        cancelBtn.style.cursor = 'pointer';
        cancelBtn.style.color = '#d9534f';
        cancelBtn.addEventListener('click', function() {
            if (uploadXHR) uploadXHR.abort();
            resetLogoBox();
        });
        logoBox.appendChild(progressBar);
        logoBox.appendChild(cancelBtn);
        // Simulate upload
        let percent = 0;
        let fakeUpload = setInterval(function() {
            percent += Math.random() * 15;
            if (percent > 100) percent = 100;
            progressInner.style.width = percent + '%';
            if (percent >= 100) {
                clearInterval(fakeUpload);
                showUploadedImg(file);
            }
        }, 300);
        // If real upload, use XMLHttpRequest and update progressInner.style.width
    }

    // Show uploaded image
    function showUploadedImg(file) {
        if (progressBar) progressBar.remove();
        if (cancelBtn) cancelBtn.remove();
        logoBox.innerHTML = '';
        uploadedImg = document.createElement('img');
        uploadedImg.style.maxWidth = '100%';
        uploadedImg.style.maxHeight = '100%';
        uploadedImg.style.borderRadius = '12px';
        uploadedImg.style.objectFit = 'contain';
        uploadedImg.style.width = '100%';
        uploadedImg.style.height = '100%';
        // Show the image
        const reader = new FileReader();
        reader.onload = function(e) {
            uploadedImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
        logoBox.appendChild(uploadedImg);
        // X button to remove
        removeImgBtn = document.createElement('button');
        removeImgBtn.textContent = '✕';
        removeImgBtn.title = 'Remove image';
        removeImgBtn.style.position = 'absolute';
        removeImgBtn.style.top = '8px';
        removeImgBtn.style.right = '8px';
        removeImgBtn.style.background = 'rgba(0,0,0,0.4)';
        removeImgBtn.style.border = 'none';
        removeImgBtn.style.color = '#fff';
        removeImgBtn.style.fontSize = '20px';
        removeImgBtn.style.borderRadius = '50%';
        removeImgBtn.style.width = '32px';
        removeImgBtn.style.height = '32px';
        removeImgBtn.style.cursor = 'pointer';
        removeImgBtn.addEventListener('click', function() {
            resetLogoBox();
        });
        logoBox.style.position = 'relative';
        logoBox.appendChild(removeImgBtn);
        logoBox.classList.add('uploaded');
    }

    // Initial setup
    resetLogoBox();
});
