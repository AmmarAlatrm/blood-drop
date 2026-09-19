document.addEventListener("DOMContentLoaded", function() {
    // فحص معلمات URL
    const urlParams = new URLSearchParams(window.location.search);
    
    // إذا كانت المعلمة showLogin موجودة وقيمتها true
    if (urlParams.get('showLogin') === 'true') {
        // عرض الـ <div class="loginBox br-gray">
        const loginBox = document.querySelector('.loginBox');
        loginBox.style.display = 'block';

        // فتح الـ Modal إذا كانت موجودة
        const loginModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
        loginModal.show();
    }
});
