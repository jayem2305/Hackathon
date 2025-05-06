const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
const passwordInputConfirm = document.getElementById('password_confirmation');
const eyeIconConfirm = document.getElementById('eyeIconConfirm');

const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const eyeIconPassword = document.getElementById('eyeIconPassword');

togglePasswordConfirm.addEventListener('click', function () {
    const type = passwordInputConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInputConfirm.setAttribute('type', type);
    eyeIconConfirm.classList.toggle('bi-eye-fill');
    eyeIconConfirm.classList.toggle('bi-eye-slash-fill');
});

togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    eyeIconPassword.classList.toggle('bi-eye-fill');
    eyeIconPassword.classList.toggle('bi-eye-slash-fill');
});

document.getElementById('phone_number').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove non-digit characters
    if (value.length > 3 && value.length <= 6) {
        value = value.slice(0, 3) + '-' + value.slice(3);
    } else if (value.length > 6) {
        value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 10);
    }
    e.target.value = value;
});