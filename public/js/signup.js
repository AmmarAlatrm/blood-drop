


function validateInput(element) {
    const value = element.value;
    const regex = /^[A-Za-zأ-ي\s]*$/;
    if (!regex.test(value)) {
        element.setCustomValidity('Please enter only Arabic or English letters.');
    } else {
        element.setCustomValidity('');
    }
    element.reportValidity();
}

function validatePhoneNumber() {
    const phoneInput = document.getElementById('phone');
    phoneInput.setCustomValidity(phoneInput.validity.patternMismatch ? 'Phone number must start with 09 and be 10 digits long.' : '');
    phoneInput.reportValidity();
}

function validateAge(element) {
    const age = parseInt(element.value, 10);
    if (age < 18 || age > 40) {
        element.setCustomValidity('Age must be between 18 and 40.');
    } else {
        element.setCustomValidity('');
    }
    element.reportValidity();
}

function validateInputs() {
    const form = document.getElementById('myForm');
    if (form.checkValidity()) {
        window.location.href = 'Donors.html';
    } else {
        form.reportValidity();
    }
}

function hideSelectedOption() {
    // Function to handle the select change event if needed
}






