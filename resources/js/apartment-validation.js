
document.addEventListener('DOMContentLoaded', function () {
    const myForm = document.getElementById('formEl');

    myForm.addEventListener('submit', function (event) {
        event.preventDefault();

        updateInput();

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
    console.log(inputs)

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].classList.contains('on')) { // if an input is showed, return false
            return false;
        }
    }
    return true; // else return true
}

function updateInput() {
    // ! NAME string length > 2
    const nameEl = document.getElementById('name'); // take the input element
    const nameErrorEl = document.querySelector('#name ~ .error'); // take the error div

    /**
     * Add a class "on" if the input is not validated
     *
     * @param {*} nameEl
     * @param {*} nameErrorEl
     */
    function nameFunc(nameEl, nameErrorEl) {
        const nameLength = nameEl.value;
        if (nameLength.trim().length < 3) {
            nameErrorEl.classList.add('on');
            nameErrorEl.innerText = "Inserisci un nome di almeno 3 lettere";
        } else {
            nameErrorEl.classList.remove('on');
            nameErrorEl.innerText = "";
        }
    }

    // call the function
    nameFunc(nameEl, nameErrorEl);
    nameEl.addEventListener('input', () => { // when the input is uploaded, refresh the error
        nameFunc(nameEl, nameErrorEl)
    })

    // ! DESCRIPTION string length > 9
    const descriptionEl = document.getElementById('description');
    const descriptionErrorEl = document.querySelector('#description ~ .error');

    function descriptionFunc(descriptionEl,descriptionErrorEl){
        const descriptionLength = descriptionEl.value.length;
        if (descriptionLength < 10) {
            descriptionErrorEl.classList.add('on');
            descriptionErrorEl.innerText = "Inserisci un nome di almeno 9 lettere";
        } else {
            descriptionErrorEl.classList.remove('on');
            descriptionErrorEl.innerText = "";
        }
    }

    descriptionFunc(descriptionEl,descriptionErrorEl);
    descriptionEl.addEventListener('input', function() {
        descriptionFunc(descriptionEl,descriptionErrorEl);
    })

    // ! ADDRESS string length > 0
    const addressEl = document.getElementById('address');
    const addressErrorEl = document.querySelector('[name="address"] ~ .error');

    function addressFunc(addressEl, addressErrorEl){
        const addressLength = addressEl.value.length;
        if (addressLength < 1) {
            addressErrorEl.classList.add('on');
            addressErrorEl.innerText = "Inserisci un indirizzo";
        } else {
            addressErrorEl.classList.remove('on');
            addressErrorEl.innerText = "";
        }
    }

    addressFunc(addressEl, addressErrorEl);
    addressEl.addEventListener('input', function() {
        addressFunc(addressEl, addressErrorEl);
    })

    // ! SURFACE number > 0
    const surfaceEl = document.getElementById('surface');
    const surfaceErrorEl = document.querySelector('[name="surface"] ~ .error');

    function surfaceFunc(surfaceEl,surfaceErrorEl){
        const surfaceText = surfaceEl.value;
        if (surfaceText.length < 0 || isNaN(Number(surfaceText)) || Number(surfaceText) <= 0) {
            surfaceErrorEl.classList.add('on');
            surfaceErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            surfaceErrorEl.classList.remove('on');
            surfaceErrorEl.innerText = "";
        }
    }

    surfaceFunc(surfaceEl,surfaceErrorEl);
    surfaceEl.addEventListener('input', function() {
        surfaceFunc(surfaceEl,surfaceErrorEl);
    })

    // ! ROOM
    const n_roomEl = document.getElementById('n_room');
    const n_roomErrorEl = document.querySelector('[name="n_room"] ~ .error');

    function roomFunc(n_roomEl, n_roomErrorEl){
        const roomText = n_roomEl.value;
        if (roomText.length < 0 ||isNaN(Number(roomText)) || Number(roomText) <= 0) {
            n_roomErrorEl.classList.add('on');
            n_roomErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            n_roomErrorEl.classList.remove('on');
            n_roomErrorEl.innerText = "";
        }
    }

    roomFunc(n_roomEl, n_roomErrorEl);
    n_roomEl.addEventListener('input', function() {
        roomFunc(n_roomEl, n_roomErrorEl);
    })

    // ! BED
    const n_bedEl = document.getElementById('n_bed');
    const n_bedErrorEl = document.querySelector('[name="n_bed"] ~ .error');

    function bedFunc(n_bedEl,n_bedErrorEl){
        const bedText = n_bedEl.value;
        if (bedText.length < 0 ||isNaN(Number(bedText)) || Number(bedText) <= 0) {
            n_bedErrorEl.classList.add('on');
            n_bedErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            n_bedErrorEl.classList.remove('on');
            n_bedErrorEl.innerText = "";
        }
    }

    bedFunc(n_bedEl,n_bedErrorEl);
    n_bedEl.addEventListener('input', function() {
        bedFunc(n_bedEl,n_bedErrorEl);
    })

    // ! BATH
    const n_bathEl = document.getElementById('n_bath');
    const n_bathErrorEl = document.querySelector('[name="n_bath"] ~ .error');

    function bathFunc(n_bathEl,n_bathErrorEl){
        const bathText = n_bathEl.value;
        if (bathText.length < 0 ||isNaN(Number(bathText)) || Number(bathText) <= 0) {
            n_bathErrorEl.classList.add('on');
            n_bathErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            n_bathErrorEl.classList.remove('on');
            n_bathErrorEl.innerText = "";
        }
    }

    bathFunc(n_bathEl ,n_bathErrorEl);
    n_bathEl.addEventListener('input', function() {
        bathFunc(n_bathEl ,n_bathErrorEl);
    })

    // ! PRICE
    const priceEl = document.getElementById('price');
    const priceErrorEl = document.querySelector('[name="price"] ~ .error');

    function priceFunc(priceEl, priceErrorEl){
        const priceText = priceEl.value;
        if (priceText.length < 0 ||isNaN(Number(priceText)) || Number(priceText) <= 0) {
            priceErrorEl.classList.add('on');
            priceErrorEl.innerText = "Inserisci un numero positivo";
        } else {
            priceErrorEl.classList.remove('on');
            priceErrorEl.innerText = "";
        }
    }

    priceFunc(priceEl, priceErrorEl);
    priceEl.addEventListener('input', function() {
        priceFunc(priceEl, priceErrorEl);
    })
}
