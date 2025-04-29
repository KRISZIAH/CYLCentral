document.addEventListener('DOMContentLoaded', function() {
    // Province and City/Municipality dynamic loading
    const regionSelect = document.getElementById('region');
    const provinceSelect = document.getElementById('province');
    const municipalitySelect = document.getElementById('municipalityCity');
    
    // Sample data - in a real app, this would come from an API
    const regionData = {
        'CAR': {
            'Abra': ['Bangued', 'Boliney', 'Bucay', 'Bucloc', 'Daguioman', 'Danglas'],
            'Benguet': ['Baguio City', 'La Trinidad', 'Itogon', 'Sablan', 'Tuba', 'Tublay']
        },
        'NCR': {
            'Metro Manila': ['Manila', 'Quezon City', 'Makati', 'Pasig', 'Taguig']
        }
    };
    
    regionSelect.addEventListener('change', function() {
        const selectedRegion = this.value;
        provinceSelect.innerHTML = '<option value="" selected disabled>Select here</option>';
        municipalitySelect.innerHTML = '<option value="" selected disabled>Select here</option>';
        
        if (selectedRegion) {
            provinceSelect.disabled = false;
            const provinces = regionData[selectedRegion];
            
            for (const province in provinces) {
                const option = document.createElement('option');
                option.value = province;
                option.textContent = province;
                provinceSelect.appendChild(option);
            }
        } else {
            provinceSelect.disabled = true;
            municipalitySelect.disabled = true;
        }
    });
    
    provinceSelect.addEventListener('change', function() {
        const selectedRegion = regionSelect.value;
        const selectedProvince = this.value;
        municipalitySelect.innerHTML = '<option value="" selected disabled>Select here</option>';
        
        if (selectedRegion && selectedProvince) {
            municipalitySelect.disabled = false;
            const municipalities = regionData[selectedRegion][selectedProvince];
            
            municipalities.forEach(municipality => {
                const option = document.createElement('option');
                option.value = municipality;
                option.textContent = municipality;
                municipalitySelect.appendChild(option);
            });
        } else {
            municipalitySelect.disabled = true;
        }
    });
    
    // Program selection handling
    const programSelect = document.getElementById('programSelect');
    const selectedProgramsContainer = document.getElementById('selectedProgramsContainer');
    let selectedPrograms = [];
    
    function updateSelectedPrograms() {
        selectedProgramsContainer.innerHTML = '';
        selectedPrograms.forEach((program, index) => {
            const programElement = document.createElement('div');
            programElement.className = 'selected-program';
            programElement.innerHTML = `
                ${program}
                <button type="button" class="remove-program" data-index="${index}">&times;</button>
            `;
            selectedProgramsContainer.appendChild(programElement);
        });

        // Update select options
        const currentOptions = Array.from(programSelect.options);
        const availableOptions = [
            { value: '', text: 'Select programs here', disabled: true },
            { value: 'Youth Leadership', text: 'Youth Leadership' },
            { value: 'Community Service', text: 'Community Service' },
            { value: 'Skills Development', text: 'Skills Development' },
            { value: 'Environmental Advocacy', text: 'Environmental Advocacy' }
        ];

        // Remove options that are already selected
        programSelect.innerHTML = '';
        availableOptions.forEach(opt => {
            if (!selectedPrograms.includes(opt.value) || opt.value === '') {
                const option = document.createElement('option');
                option.value = opt.value;
                option.textContent = opt.text;
                option.disabled = opt.disabled || false;
                if (opt.value === '') option.selected = true;
                programSelect.appendChild(option);
            }
        });
    }
    
    if (programSelect) {
        programSelect.addEventListener('change', function() {
            const selectedValue = this.value;
            if (!selectedValue || selectedValue === '') return;
            
            if (selectedPrograms.length >= 2) {
                alert('You can only select up to 2 programs');
                this.value = '';
                return;
            }
            
            if (!selectedPrograms.includes(selectedValue)) {
                selectedPrograms.push(selectedValue);
                updateSelectedPrograms();
            }
            
            this.classList.toggle('is-invalid', selectedPrograms.length < 1);
            this.value = ''; // Reset to placeholder
        });

        // Handle removing selected programs
        selectedProgramsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-program')) {
                const index = parseInt(e.target.dataset.index);
                selectedPrograms.splice(index, 1);
                updateSelectedPrograms();
                programSelect.classList.toggle('is-invalid', selectedPrograms.length < 1);
            }
        });
    }

    // File upload handling
    const uploadBtn = document.querySelector('.upload-box .btn-success');
    if (uploadBtn) {
        uploadBtn.addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.max = '10485760'; // 10MB in bytes

            input.onchange = function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (file.size > 10485760) {
                        alert('File size must be less than 10MB');
                        return;
                    }
                    // Here you would typically upload the file to your server
                    const uploadBox = document.querySelector('.upload-box p');
                    uploadBox.textContent = `Selected file: ${file.name}`;
                }
            };

            input.click();
        });
    }

    // Payment method handling
    const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]');
    const payNowBtn = document.querySelector('.payment-total .btn-success');

    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            if (this.id === 'uploadProof') {
                payNowBtn.textContent = 'UPLOAD PROOF';
            } else {
                payNowBtn.textContent = 'PAY NOW';
            }
        });
    });

    // Pay now button handling
    if (payNowBtn) {
        payNowBtn.addEventListener('click', function() {
            const selectedMethod = document.querySelector('input[name="paymentMethod"]:checked');
            if (selectedMethod.id === 'uploadProof') {
                const input = document.createElement('input');
                input.type = 'file';
                input.accept = 'image/*';
                input.onchange = function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Here you would typically upload the proof to your server
                        alert(`Payment proof uploaded: ${file.name}`);
                    }
                };
                input.click();
            } else {
                // Here you would redirect to PayMongo payment page
                alert('Redirecting to PayMongo payment page...');
            }
        });
    }

    // Clear form button
    const clearFormBtn = document.querySelector('.btn-outline-secondary');
    if (clearFormBtn) {
        clearFormBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to clear all form fields?')) {
                document.getElementById('membershipForm').reset();
                document.getElementById('commitmentForm').reset();
                document.getElementById('verificationForm').reset();
                document.getElementById('paymentForm').reset();
                
                // Reset upload box text
                const uploadBox = document.querySelector('.upload-box p');
                if (uploadBox) {
                    uploadBox.textContent = 'Upload here 1 supported file. Max 10 MB';
                }

                // Reset payment button text
                if (payNowBtn) {
                    payNowBtn.textContent = 'PAY NOW';
                }

                // Reset all invalid states
                document.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });
            }
        });
    }

    // Submit application button
    const submitBtn = document.querySelector('.btn-primary');
    if (submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();

            // Validate all required fields
            const forms = [
                document.getElementById('membershipForm'),
                document.getElementById('commitmentForm'),
                document.getElementById('verificationForm'),
                document.getElementById('paymentForm')
            ];

            let isValid = true;

            // Check each form's required fields
            forms.forEach(form => {
                if (form) {
                    const requiredFields = form.querySelectorAll('[required]');
                    requiredFields.forEach(field => {
                        if (!field.value) {
                            field.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });
                }
            });

            // Validate program selection
            if (selectedPrograms.length < 1 || selectedPrograms.length > 2) {
                alert('Please select 1-2 programs');
                programSelect.classList.add('is-invalid');
                isValid = false;
            }

            // Validate photo upload
            const uploadBoxText = document.querySelector('.upload-box p').textContent;
            if (!uploadBoxText.startsWith('Selected file:')) {
                alert('Please upload your photo');
                isValid = false;
            }

            // Validate payment
            const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');
            if (selectedPaymentMethod.id === 'uploadProof' && payNowBtn.textContent === 'UPLOAD PROOF') {
                alert('Please upload your payment proof');
                isValid = false;
            }

            if (isValid) {
                // Here you would typically submit all form data to your server
                alert('Application submitted successfully!');
                // Optionally reset the form
                if (confirm('Would you like to submit another application?')) {
                    clearFormBtn.click();
                }
            } else {
                alert('Please fill in all required fields and complete all required steps');
            }
        });
    }

    // Form submission
    const form = document.getElementById('membershipForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate program selection
        const checkedPrograms = document.querySelectorAll('.program-checkbox:checked');
        if (checkedPrograms.length < 1 || checkedPrograms.length > 2) {
            programContainer.classList.add('is-invalid');
            return;
        }
        
        // In a real application, you would send the form data to a server here
        alert('Form submitted successfully!');
        // form.reset();
    });
});