const form = document.querySelector('#form-login');
const inputs = form.querySelectorAll('input[type="text"],input[type="password"]');
const inputLogin = form.querySelector('input[name="login"]');
const inputPassword = form.querySelector('input[name="password"]');
const errorsBlock = document.querySelector('.errors-validation-block');
let errors = [];

function clearFromErrors(elements) {
    elements.forEach(elem => {
        elem.classList.remove('form-input-error');
    });
}

function findEmptyFields(elements){
    if (inputLogin.value === ''){
        errors.push('Поле Логин обязательно к заполнению.');
        inputLogin.classList.add('form-input-error');
    }
    if (inputPassword.value === ''){
        errors.push('Поле Пароль обязательно к заполнению.');
        inputPassword.classList.add('form-input-error');
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
    if(errors.length !== 0){
        e.preventDefault();
        outpuErrors(errors);
    }
});
