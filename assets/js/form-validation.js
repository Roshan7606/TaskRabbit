function showError(id, message) {
    var errorEl = document.getElementById('error_' + id);
    var inputEl = document.getElementById(id);
    var tickEl = document.getElementById('tick_' + id);

    if (errorEl) {
        errorEl.innerText = message;
    }

    if (inputEl) {
        inputEl.classList.remove('input-valid');
        inputEl.classList.add('input-invalid');
    }

    if (tickEl) {
        tickEl.style.display = 'none';
    }
}

function showValid(id) {
    var errorEl = document.getElementById('error_' + id);
    var inputEl = document.getElementById(id);
    var tickEl = document.getElementById('tick_' + id);

    if (errorEl) {
        errorEl.innerText = '';
    }

    if (inputEl) {
        inputEl.classList.remove('input-invalid');
        inputEl.classList.add('input-valid');
    }

    if (tickEl) {
        tickEl.style.display = 'inline-block';
    }
}

function clearValidation(id) {
    var errorEl = document.getElementById('error_' + id);
    var inputEl = document.getElementById(id);
    var tickEl = document.getElementById('tick_' + id);

    if (errorEl) {
        errorEl.innerText = '';
    }

    if (inputEl) {
        inputEl.classList.remove('input-valid');
        inputEl.classList.remove('input-invalid');
    }

    if (tickEl) {
        tickEl.style.display = 'none';
    }
}

function validateRequired(id, message) {
    var field = document.getElementById(id);
    if (!field) return true;

    var value = field.value.trim();

    if (value === '') {
        showError(id, message || 'This field is required');
        return false;
    }

    showValid(id);
    return true;
}

function validateName(id) {
    var field = document.getElementById(id);
    if (!field) return false;

    var value = field.value.trim();

    if (value === "") {
        showError(id, "Name required");
        return false;
    }

    if (!/^[A-Za-z ]+$/.test(value)) {
        showError(id, "Only letters allowed");
        return false;
    }

    if (value.length < 2) {
        showError(id, "Name must be at least 2 characters");
        return false;
    }

    showValid(id);
    return true;
}

function validatePhone(id) {
    var field = document.getElementById(id);
    if (!field) return true;

    var value = field.value.trim();
    var regex = /^[0-9]{10}$/;

    if (value === '') {
        showError(id, "Phone number required");
        return false;
    }

    if (!regex.test(value)) {
        showError(id, "Enter valid 10 digit number");
        return false;
    }

    showValid(id);
    return true;
}

function validateEmail(id) {
    var field = document.getElementById(id);
    if (!field) return true;

    var value = field.value.trim().toLowerCase();

    // Basic email structure check
    var basicRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

    // Allowed real extensions
    var allowedExtensions = [
        "com", "in", "org", "net", "edu", "gov", "co",
        "io", "info", "biz", "co.in", "ac.in", "firm.in",
        "gen.in", "ind.in", "us", "uk", "co.uk", "ae",
        "ca", "au", "de", "fr", "jp", "sg"
    ];

    if (value === '') {
        showError(id, "Email required");
        return false;
    }

    if (!basicRegex.test(value)) {
        showError(id, "Invalid email address");
        return false;
    }

    var domainPart = value.split('@')[1];
    if (!domainPart) {
        showError(id, "Invalid email address");
        return false;
    }

    var isAllowed = false;

    for (var i = 0; i < allowedExtensions.length; i++) {
        if (domainPart.endsWith('.' + allowedExtensions[i])) {
            isAllowed = true;
            break;
        }
    }

    if (!isAllowed) {
        showError(id, "Enter email with valid domain extension");
        return false;
    }

    showValid(id);
    return true;
}

function validatePassword(id) {
    var field = document.getElementById(id);
    if (!field) return false;

    var value = field.value.trim();

    if (value === "") {
        showError(id, "Password required");
        return false;
    }

    if (value.length < 8) {
        showError(id, "Password must be at least 8 characters");
        return false;
    }

    if (!/[A-Z]/.test(value)) {
        showError(id, "Password must contain at least 1 uppercase letter");
        return false;
    }

    if (!/[0-9]/.test(value)) {
        showError(id, "Password must contain at least 1 number");
        return false;
    }

    if (!/[!@#$%^&*(),.?":{}|<>_\-\\/\[\]+=;`~]/.test(value)) {
        showError(id, "Password must contain at least 1 special character");
        return false;
    }

    showValid(id);
    return true;
}

function validateLoginPassword(id) {
    var field = document.getElementById(id);
    if (!field) return false;

    var value = field.value.trim();

    if (value === "") {
        showError(id, "Password required");
        return false;
    }

    showValid(id);
    return true;
}

function validateConfirmPassword(passwordId, confirmPasswordId) {
    var passwordField = document.getElementById(passwordId);
    var confirmField = document.getElementById(confirmPasswordId);

    if (!passwordField || !confirmField) return true;

    var password = passwordField.value;
    var confirmPassword = confirmField.value;

    if (confirmPassword.trim() === '') {
        showError(confirmPasswordId, "Confirm password required");
        return false;
    }

    if (password !== confirmPassword) {
        showError(confirmPasswordId, "Passwords do not match");
        return false;
    }

    showValid(confirmPasswordId);
    return true;
}