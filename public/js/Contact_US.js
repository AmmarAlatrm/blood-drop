

function validateInput(element) {
  const value = element.value;
  const regex = /^[A-Za-zأ-ي\s]*$/;
  if (!regex.test(value)) {
    element.setCustomValidity('يرجى إدخال أحرف عربية أو إنجليزية فقط.');
  } else {
    element.setCustomValidity('');
  }
  // Trigger the browser's validation UI
  element.reportValidity();
}

function validatePhoneNumber() {
    const phoneInput = document.getElementById('phone');
    const warningMessage = document.getElementById('phone-warning');
    const phoneValue = phoneInput.value;

    // تحقق مما إذا كان الرقم يبدأ بـ "09" ويتكون من 10 أرقام
    const phonePattern = /^09\d{8}$/;

    if (!phonePattern.test(phoneValue)) {
        warningMessage.style.display = 'block';
    } else {
        warningMessage.style.display = 'none';
    }
}
