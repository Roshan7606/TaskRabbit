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
    if (!field) return true;

    var value = field.value.trim();
    var regex = /^[A-Za-z ]+$/;

    if (value === '') {
        showError(id, "Field is required");
        return false;
    }

    if (value.length < 2) {
        showError(id, "Minimum 2 characters required");
        return false;
    }

    if (!regex.test(value)) {
        showError(id, "Only letters and spaces allowed");
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

    var value = field.value.trim();
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (value === '') {
        showError(id, "Email required");
        return false;
    }

    if (!regex.test(value)) {
        showError(id, "Invalid email address");
        return false;
    }

    showValid(id);
    return true;
}

function validatePassword(id) {
    var field = document.getElementById(id);
    if (!field) return true;

    var value = field.value;

    if (value.trim() === '') {
        showError(id, "Password required");
        return false;
    }

    if (value.length < 6) {
        showError(id, "Minimum 6 characters");
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