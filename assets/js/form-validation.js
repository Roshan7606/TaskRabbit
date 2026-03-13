function showError(id, message) {
    var errorEl = document.getElementById('error_' + id);
    var inputEl = document.getElementById(id);

    if (errorEl) errorEl.innerText = message;

    if (inputEl) {
        inputEl.classList.remove('input-valid');
        inputEl.classList.add('input-invalid');
    }
}

function showValid(id) {
    var errorEl = document.getElementById('error_' + id);
    var inputEl = document.getElementById(id);

    if (errorEl) errorEl.innerText = '';

    if (inputEl) {
        inputEl.classList.remove('input-invalid');
        inputEl.classList.add('input-valid');
    }
}

function validateName(id) {
    var value = document.getElementById(id).value.trim();
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
        showError(id, "Only letters allowed");
        return false;
    }

    showValid(id);
    return true;
}

function validatePhone(id) {
    var value = document.getElementById(id).value.trim();
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
    var value = document.getElementById(id).value.trim();
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
    var value = document.getElementById(id).value;

    if (value === '') {
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