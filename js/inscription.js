// Registration Form JavaScript

document.addEventListener('DOMContentLoaded', function () {
    // Form elements
    const form = document.getElementById('registrationForm');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const formFileSmInput = document.getElementById('formFileSm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const submitBtn = document.getElementById('submitBtn');
    const submitMessage = document.getElementById('submitMessage');

    // Password toggle buttons
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    // Password strength elements
    const passwordStrength = document.getElementById('passwordStrength');
    const strengthBar = passwordStrength.querySelector('.progress-bar');
    const strengthLabel = passwordStrength.querySelector('.strength-label');
    const requirements = passwordStrength.querySelectorAll('.password-requirements small');

    // Form validation state
    let isSubmitting = false;

    // Initialize event listeners
    initializeEventListeners();

    function initializeEventListeners() {
        // Form submission
        form.addEventListener('submit', handleFormSubmit);

        // Input validation
        fullNameInput.addEventListener('input', () => validateField(fullNameInput));
        fullNameInput.addEventListener('blur', () => validateField(fullNameInput));

        emailInput.addEventListener('input', () => validateField(emailInput));
        emailInput.addEventListener('blur', () => validateField(emailInput));

        phoneInput.addEventListener('input', () => validateField(phoneInput));
        phoneInput.addEventListener('blur', () => validateField(phoneInput));

        formFileSmInput.addEventListener('input', () => validateField(formFileSmInput));
        formFileSmInput.addEventListener('blur', () => validateField(formFileSmInput));

        passwordInput.addEventListener('input', handlePasswordInput);
        passwordInput.addEventListener('blur', () => validateField(passwordInput));

        confirmPasswordInput.addEventListener('input', () => validateField(confirmPasswordInput));
        confirmPasswordInput.addEventListener('blur', () => validateField(confirmPasswordInput));

        // Password toggle functionality
        togglePassword.addEventListener('click', () => togglePasswordVisibility(passwordInput, togglePassword));
        toggleConfirmPassword.addEventListener('click', () => togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword));

        // Clear messages when user starts typing
        [fullNameInput, emailInput, phoneInput, passwordInput, confirmPasswordInput].forEach(input => {
            input.addEventListener('input', clearSubmitMessage);
        });
    }

    function handleFormSubmit(e) {
        e.preventDefault();

        if (isSubmitting) return;

        // Validate all fields
        const isValid = validateAllFields();

        if (!isValid) {
            showMessage('Veuillez corriger les erreurs ci-dessus', 'danger');
            form.classList.add('shake');
            setTimeout(() => form.classList.remove('shake'), 500);
            return;
        }

        // Check password strength
        const strength = calculatePasswordStrength(passwordInput.value);
        if (strength.score < 3) {
            showMessage('Veuillez choisir un mot de passe plus fort', 'danger');
            passwordInput.focus();
            return;
        }

        // Submit form
        submitForm();
    }

    async function submitForm() {
        setSubmittingState(true);

        try {
            // Simulate API call
            await new Promise(resolve => setTimeout(resolve, 2000));

            // Success
            showMessage('Inscription réussie ! Bienvenue !', 'success');

            // Reset form after delay
            setTimeout(() => {
                form.reset();
                clearAllValidation();
                clearSubmitMessage();
                passwordStrength.style.display = 'none';
            }, 3000);

        } catch (error) {
            showMessage('Échec de l\'inscription. Veuillez réessayer.', 'danger');
        } finally {
            setSubmittingState(false);
        }
    }

    function validateAllFields() {
        const fields = [fullNameInput, emailInput, phoneInput, passwordInput, confirmPasswordInput];
        let isValid = true;

        fields.forEach(field => {
            if (!validateField(field)) {
                isValid = false;
            }
        });

        return isValid;
    }

    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let errorMessage = '';

        switch (field.id) {
            case 'fullName':
                if (!value) {
                    errorMessage = 'Le nom complet est requis';
                    isValid = false;
                } else if (value.length < 2) {
                    errorMessage = 'Le nom doit contenir au moins 2 caractères';
                    isValid = false;
                }
                break;

            case 'email':
                if (!value) {
                    errorMessage = 'L\'adresse email est requise';
                    isValid = false;
                } else if (!isValidEmail(value)) {
                    errorMessage = 'Veuillez entrer une adresse email valide';
                    isValid = false;
                }
                break;

            case 'phone':
                if (!value) {
                    errorMessage = 'Le numéro de téléphone est requise';
                    isValid = false;
                } else if (!/^\+?[0-9\s-]{9,12}$/.test(value)) {
                    errorMessage = 'Veuillez entrer un numéro de téléphone valide (de 9 chiffres, sans indicatif international)';
                    isValid = false;
                }
                break;

            case 'password':
                if (!value) {
                    errorMessage = 'Le mot de passe est requis';
                    isValid = false;
                } else if (value.length < 8) {
                    errorMessage = 'Le mot de passe doit contenir au moins 8 caractères';
                    isValid = false;
                }
                break;

            case 'confirmPassword':
                if (!value) {
                    errorMessage = 'Veuillez confirmer votre mot de passe';
                    isValid = false;
                } else if (value !== passwordInput.value) {
                    errorMessage = 'Les mots de passe ne correspondent pas';
                    isValid = false;
                }
                break;
        }

        setFieldValidation(field, isValid, errorMessage);
        return isValid;
    }

    function setFieldValidation(field, isValid, errorMessage) {
        const feedback = field.parentNode.parentNode.querySelector('.invalid-feedback');

        if (isValid) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            feedback.textContent = '';
        } else {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            feedback.textContent = errorMessage;
        }
    }

    function clearAllValidation() {
        const fields = [fullNameInput, emailInput, phoneInput, passwordInput, confirmPasswordInput];
        fields.forEach(field => {
            field.classList.remove('is-valid', 'is-invalid');
            const feedback = field.parentNode.parentNode.querySelector('.invalid-feedback');
            feedback.textContent = '';
        });
    }

    function handlePasswordInput() {
        const password = passwordInput.value;

        if (password) {
            passwordStrength.style.display = 'block';
            updatePasswordStrength(password);
        } else {
            passwordStrength.style.display = 'none';
        }

        validateField(passwordInput);

        // Revalidate confirm password if it has a value
        if (confirmPasswordInput.value) {
            validateField(confirmPasswordInput);
        }
    }

    function updatePasswordStrength(password) {
        const strength = calculatePasswordStrength(password);

        // Update progress bar
        strengthBar.className = `progress-bar strength-${strength.level}`;
        strengthLabel.textContent = strength.label;
        strengthLabel.className = `strength-label fw-medium text-${strength.color}`;

        // Update requirements
        updatePasswordRequirements(password);
    }

    function calculatePasswordStrength(password) {
        let score = 0;
        const checks = {
            length: password.length >= 8,
            lowercase: /[a-z]/.test(password),
            uppercase: /[A-Z]/.test(password),
            number: /\d/.test(password),
            special: /[^a-zA-Z\d]/.test(password)
        };

        Object.values(checks).forEach(check => {
            if (check) score++;
        });

        const levels = {
            0: { level: 'very-weak', label: '', color: 'muted' },
            1: { level: 'very-weak', label: 'Très faible', color: 'danger' },
            2: { level: 'weak', label: 'Faible', color: 'warning' },
            3: { level: 'fair', label: 'Correct', color: 'info' },
            4: { level: 'good', label: 'Bon', color: 'primary' },
            5: { level: 'strong', label: 'Fort', color: 'success' }
        };

        return { score, ...levels[score], checks };
    }

    function updatePasswordRequirements(password) {
        const checks = [
            { test: password.length >= 8, index: 0 },
            { test: /[A-Z]/.test(password), index: 1 },
            { test: /\d/.test(password), index: 2 },
            { test: /[^a-zA-Z\d]/.test(password), index: 3 }
        ];

        checks.forEach(({ test, index }) => {
            const requirement = requirements[index];
            const successIcon = requirement.querySelector('.bi-check-circle');
            const errorIcon = requirement.querySelector('.bi-x-circle');

            if (test) {
                successIcon.style.display = 'inline';
                errorIcon.style.display = 'none';
                requirement.classList.remove('text-muted');
                requirement.classList.add('text-success');
            } else {
                successIcon.style.display = 'none';
                errorIcon.style.display = 'inline';
                requirement.classList.remove('text-success');
                requirement.classList.add('text-muted');
            }
        });
    }

    function togglePasswordVisibility(input, button) {
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }

    function setSubmittingState(submitting) {
        isSubmitting = submitting;
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');

        if (submitting) {
            submitBtn.disabled = true;
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
        } else {
            submitBtn.disabled = false;
            btnText.classList.remove('d-none');
            btnLoading.classList.add('d-none');
        }
    }

    function showMessage(message, type) {
        submitMessage.className = `alert alert-${type}`;
        submitMessage.innerHTML = `
            <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
        `;
        submitMessage.classList.remove('d-none');

        // Scroll to message
        submitMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function clearSubmitMessage() {
        submitMessage.classList.add('d-none');
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Accessibility improvements
    function handleKeyboardNavigation(e) {
        if (e.key === 'Enter' && e.target.tagName === 'BUTTON' && e.target.type === 'button') {
            e.target.click();
        }
    }

    document.addEventListener('keydown', handleKeyboardNavigation);

    // Form auto-save (optional)
    function saveFormData() {
        const formData = {
            fullName: fullNameInput.value,
            email: emailInput.value
        };
        localStorage.setItem('registrationFormData', JSON.stringify(formData));
    }

    function loadFormData() {
        const savedData = localStorage.getItem('registrationFormData');
        if (savedData) {
            const data = JSON.parse(savedData);
            fullNameInput.value = data.fullName || '';
            emailInput.value = data.email || '';
        }
    }

    // Load saved data on page load
    loadFormData();

    // Save data on input (debounced)
    let saveTimeout;
    [fullNameInput, emailInput].forEach(input => {
        input.addEventListener('input', () => {
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(saveFormData, 1000);
        });
    });

    // Clear saved data on successful submission
    form.addEventListener('submit', () => {
        if (validateAllFields()) {
            localStorage.removeItem('registrationFormData');
        }
    });
});