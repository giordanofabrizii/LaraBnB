document.addEventListener('DOMContentLoaded', function () {
    const formEl = document.getElementById('formEl');

    formEl.addEventListener('submit', function (event) {
        event.preventDefault();

        updateInput();

        // Inizializza una variabile per tenere traccia se ci sono errori
        let result = validate();
        console.log(result);

        // Se non ci sono errori, invia il modulo
        if (result === true) {
            formEl.submit();
        }
    });
});

function validate() {
    const inputs = document.querySelectorAll('.error');

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].classList.contains('on')) { // if an input is showed, return false
            return false;
        }
    }
    return true; // else return true
}

function updateInput() {
    // ! NAME VALIDATION
    const nameEl = document.getElementById('name');
    const nameErrorEl = document.querySelector('#name ~ .error');

    function nameFn(nameEl, nameErrorEl){
        if ((nameEl.value).trim() == "") {
            nameErrorEl.classList.add('on')
            nameErrorEl.innerText = "Il campo deve essere compilato"
        } else {
            nameErrorEl.classList.remove('on')
        }
    }

    nameFn(nameEl, nameErrorEl);
    nameEl.addEventListener('input', () => {
        nameFn(nameEl, nameErrorEl);
    })

    // ! LASTNAME VALIDATION
    const lastnameEl = document.getElementById('lastname');
    const lastnameErrorEl = document.querySelector('#lastname ~ .error');

    function lastnameFn(lastnameEl, lastnameErrorEl){
        if ((lastnameEl.value).trim() == "") {
            lastnameErrorEl.classList.add('on')
            lastnameErrorEl.innerText = "Il campo deve essere compilato"
        } else {
            lastnameErrorEl.classList.remove('on')
        }
    }

    lastnameFn(lastnameEl, lastnameErrorEl);
    lastnameEl.addEventListener('input', () => {
        lastnameFn(lastnameEl, lastnameErrorEl);
    })

    // ! EMAIL VALIDATION
    const emailEl = document.getElementById('email');
    const emailErrorEl = document.querySelector('#email ~ .error');

    function emailFn(emailEl, emailErrorEl){
        function testEmail(email){
            // function to control if the email respect the pattern text@text.text
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        if (!testEmail(emailEl.value)) {
            emailErrorEl.classList.add('on')
            emailErrorEl.innerText = "Inserisci un email valida"
        } else {
            emailErrorEl.classList.remove('on')
        }
    }

    emailFn(emailEl, emailErrorEl);
    emailEl.addEventListener('input', () => {
        emailFn(emailEl, emailErrorEl);
    })

    // ! PASSWORD VALIDATION
    const passwordEl = document.getElementById('password');
    const passwordErrorEl = document.querySelector('#password ~ .error');

    passwordFn(passwordEl, passwordErrorEl);

    // ! PASSWORD CONFIRM VALIDATION
    const passwordConfirmEl = document.getElementById('password-confirm');
    const passwordConfirmErrorEl = document.querySelector('#password-confirm ~ .error');

    passwordConfirmFn(passwordConfirmEl, passwordConfirmErrorEl, passwordEl);

}

function passwordFn(passwordEl, passwordErrorEl){
    function testPassword(string){
        let result = true;
        if (string.length <= 7) {
            result = false;
            document.querySelector('p.length').classList = ["length"]; // reset the class
            document.querySelector('p.length').classList.add('red') // add the right class
        } else {
            document.querySelector('p.length').classList = ["length"];
            document.querySelector('p.length').classList.add('green')
        }
        if (!/\d/.test(string)) { // control if has a number
            result = false
            document.querySelector('p.number').classList = ["number"];
            document.querySelector('p.number').classList.add('red')
        } else {
            document.querySelector('p.number').classList =["number"];
            document.querySelector('p.number').classList.add('green')
        }
        if (!/[A-Z]/.test(string)) { // control if has a capital letter
            result = false;
            document.querySelector('p.capital').classList =["capital"];
            document.querySelector('p.capital').classList.add('red')
        } else {
            document.querySelector('p.capital').classList =["capital"];
            document.querySelector('p.capital').classList.add('green')
        }
        if(/\s/.test(string)) { // control if has a space
            result = false
            document.querySelector('p.space').classList =["space"];
            document.querySelector('p.space').classList.add('red')
        } else {
            document.querySelector('p.space').classList =["space"];
            document.querySelector('p.space').classList.add('green')
        }

        return result;
    }

    if (!testPassword(passwordEl.value)) {
        passwordErrorEl.classList.add('on')
    } else {
        passwordErrorEl.classList.remove('on')
    }
}

function passwordConfirmFn(passwordConfirmEl, passwordConfirmErrorEl, passwordEl){
    console.log("ciao")
    if (!(passwordConfirmEl.value == passwordEl.value)) {
        passwordConfirmErrorEl.classList.add('on')
        passwordConfirmErrorEl.innerText = "Le password devono essere uguali"
    } else {
        passwordConfirmErrorEl.classList.remove('on')
    }
}

const passwordEl = document.getElementById('password');
const passwordErrorEl = document.querySelector('#password ~ .error');
const passwordConfirmEl = document.getElementById('password-confirm');
const passwordConfirmErrorEl = document.querySelector('#password-confirm ~ .error');

passwordEl.addEventListener('input', () => {
    passwordConfirmFn(passwordConfirmEl, passwordConfirmErrorEl, passwordEl);
    passwordFn(passwordEl, passwordErrorEl);
})

passwordConfirmEl.addEventListener('input', () => {
    passwordConfirmFn(passwordConfirmEl, passwordConfirmErrorEl, passwordEl);
})
