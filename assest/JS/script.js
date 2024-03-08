const form = document.querySelector('#form-register');
const inputs = form.querySelectorAll('input[type="text"],input[type="email"],input[type="password"]');
const inputFio = form.querySelector('input[name="fio"]');
const inputLogin = form.querySelector('input[name="login"]');
const inputEmail = form.querySelector('input[name="email"]');
const inputPassword = form.querySelector('input[name="password"]');
const inputPasswordConfirm = form.querySelector('input[name="password_confirm"]');
const errorsBlock = document.querySelector('.errors-validation-block');
let errors = [];

function clearFromErrors(elements) {
    elements.forEach(elem => {
        elem.classList.remove('form-input-error');
    });
}

function findEmptyFields(elements){
    if (inputFio.value === ''){
        errors.push('Поле ФИО обязательно к заполнению.');
        inputFio.classList.add('form-input-error');
    }
    if (inputEmail.value === ''){
        errors.push('Поле Email обязательно к заполнению.');
        inputEmail.classList.add('form-input-error');
    }
    if (inputLogin.value === ''){
        errors.push('Поле Логин обязательно к заполнению.');
        inputLogin.classList.add('form-input-error');
    }
    if (inputPassword.value === ''){
        errors.push('Поле Пароль обязательно к заполнению.');
        inputPassword.classList.add('form-input-error');
    }
    if (inputPasswordConfirm.value === ''){
        errors.push('Поле Повтор пароля обязательно к заполнению.');
        inputPasswordConfirm.classList.add('form-input-error');
    }
}

function checkLogin(f){
    if(inputLogin.value.search(/[а-яА-Я]/) !== -1){
        errors.push('В логине должна присутствовать только латиница.');
        inputLogin.classList.add('form-input-error');
    }
}
function checkPassword(f){
    if(inputPassword.value.search(/\w{6,}$/) === -1){
        errors.push('Пароль должен содержать минимум 6 символов');
        inputPassword.classList.add('form-input-error');
    }
}
function inputPasswordCo(f){
    if(inputPasswordConfirm.value !== inputPassword.value){
        errors.push('Пароли не совпадают');
        inputPasswordConfirm.classList.add('form-input-error');
    }
}

function outpuErrors(err){
    errorsBlock.classList.remove('disp-none');
    err.forEach(error => {
        const elem = document.createElement('p');
        elem.textContent = error;
        errorsBlock.appendChild(elem);
    });
}

form.addEventListener('submit', function(e){
    errors = [];
    errorsBlock.classList.add('disp-none');
    errorsBlock.innerHTML = '';
    clearFromErrors(inputs);
    findEmptyFields(inputs);
    checkLogin(form);
    checkPassword(form);
    inputPasswordCo(form);
    if(errors.length !== 0){
        e.preventDefault();
        outpuErrors(errors);
    }
});
