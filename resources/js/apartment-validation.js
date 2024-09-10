document.addEventListener('DOMContentLoaded', function () {
    const myForm = document.getElementById('formEl');

    // ! NAME string length > 2
    const nameEl = document.getElementById('name');
    const nameErrorEl = document.querySelector('#name ~ .error');
    nameEl.addEventListener('input', () => {
        const nameLength = nameEl.value;
        console.log("input")
        if (nameLength.trim().length < 3) {
            nameErrorEl.classList.add('on');
            nameErrorEl.innerText = "Inserisci un nome di almeno 3 lettere";
        } else {
            nameErrorEl.classList.remove('on');
            nameErrorEl.innerText = "";
        }
    })

    // ! DESCRIPTION string length > 9
    const descriptionEl = document.getElementById('description');
    const descriptionErrorEl = document.querySelector('#description + .error');
    descriptionEl.addEventListener('input', function() {
        const descriptionLength = descriptionEl.value.length;
        if (descriptionLength < 10) {
            descriptionErrorEl.classList.add('on');
            descriptionErrorEl.innerText = "Inserisci un nome di almeno 9 lettere";
        } else {
            descriptionErrorEl.classList.remove('on');
            descriptionErrorEl.innerText = "";
        }
    })

    // ! ADDRESS string length > 0
    const addressEl = document.getElementById('address');
    const addressErrorEl = document.querySelector('[name="address"] + .error');
    addressEl.addEventListener('input', function() {
        const addressLength = addressEl.value.length;
        if (addressLength < 1) {
            addressErrorEl.classList.add('on');
            addressErrorEl.innerText = "Inserisci un indirizzo";
        } else {
            addressErrorEl.classList.remove('on');
            addressErrorEl.innerText = "";
        }
    })

    // ! SURFACE number > 0
    const surfaceEl = document.getElementById('surface');
    const surfaceErrorEl = document.querySelector('[name="surface"] + .error');
    surfaceEl.addEventListener('input', function() {
        console.log('surface')
        const surfaceText = surfaceEl.value;
        if (surfaceText.length < 0 || isNaN(Number(surfaceText)) || Number(surfaceText) <= 0) {
            surfaceErrorEl.classList.add('on');
            surfaceErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            surfaceErrorEl.classList.remove('on');
            surfaceErrorEl.innerText = "";
        }
    })

    // ! ROOM
    const n_roomEl = document.getElementById('n_room');
    const n_roomErrorEl = document.querySelector('[name="n_room"] + .error');
    n_roomEl.addEventListener('input', function() {
        const roomText = n_roomEl.value;
        if (roomText.length < 0 ||isNaN(Number(roomText)) || Number(roomText) <= 0) {
            n_roomErrorEl.classList.add('on');
            n_roomErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            n_roomErrorEl.classList.remove('on');
            n_roomErrorEl.innerText = "";
        }
    })

    // ! BED
    const n_bedEl = document.getElementById('n_bed');
    const n_bedErrorEl = document.querySelector('[name="n_bed"] + .error');
    n_bedEl.addEventListener('input', function() {
        const bedText = n_bedEl.value;
        if (bedText.length < 0 ||isNaN(Number(bedText)) || Number(bedText) <= 0) {
            n_bedErrorEl.classList.add('on');
            n_bedErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            n_bedErrorEl.classList.remove('on');
            n_bedErrorEl.innerText = "";
        }
    })

    // ! BATH
    const n_bathEl = document.getElementById('n_bath');
    const n_bathErrorEl = document.querySelector('[name="n_bath"] + .error');
    n_bathEl.addEventListener('input', function() {
    const bathText = n_bathEl.value;
        if (bathText.length < 0 ||isNaN(Number(bathText)) || Number(bathText) <= 0) {
            n_bathErrorEl.classList.add('on');
            n_bathErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            n_bathErrorEl.classList.remove('on');
            n_bathErrorEl.innerText = "";
        }
    })

    // ! PRICE
    const priceEl = document.getElementById('price');
    const priceErrorEl = document.querySelector('[name="price"] + .error');
    priceEl.addEventListener('input', function() {
        const priceText = priceEl.value;
        if (priceText.length < 0 ||isNaN(Number(priceText)) || Number(priceText) <= 0) {
            priceErrorEl.classList.add('on');
            priceErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            priceErrorEl.classList.remove('on');
            priceErrorEl.innerText = "";
        }
    })


    myForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Inizializza una variabile per tenere traccia se ci sono errori
        let result = validate();
        console.log(result);

        // Se non ci sono errori, invia il modulo
        if (result === true) {
            myForm.submit();
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
