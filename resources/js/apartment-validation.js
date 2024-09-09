// ! DESCRIPTION string length > 2
const nameEl = document.getElementById('name');
const nameErrorEl = document.querySelector('[name="name"] + .error');
nameEl.addEventListener('input', function() {
    const nameLength = nameEl.value.length;

    if (nameLength < 3) {
        nameErrorEl.style.display = 'block';
        nameErrorEl.innerHTML = "Inserisci un nome di almeno 3 lettere";
    } else {
        nameErrorEl.style.display = 'none';
    }
})

// ! DESCRIPTION string length > 9
const descriptionEl = document.getElementById('description');
const descriptionErrorEl = document.querySelector('[name="description"] + .error');
descriptionEl.addEventListener('input', function() {
    const descriptionLength = descriptionEl.value.length;

    if (descriptionLength < 10) {
        descriptionErrorEl.style.display = 'block';
        descriptionErrorEl.innerHTML = "Inserisci un nome di almeno 9 lettere";
    } else {
        descriptionErrorEl.style.display = 'none';
    }
})

// ! ADDRESS string length > 0
const addressEl = document.getElementById('address');
const addressErrorEl = document.querySelector('[name="address"] + .error');
addressEl.addEventListener('input', function() {
    const addressLength = addressEl.value.length;

    if (addressLength < 1) {
        addressErrorEl.style.display = 'block';
        addressErrorEl.innerHTML = "Inserisci un indirizzo";
    } else {
        addressErrorEl.style.display = 'none';
    }
})

// ! SURFACE number > 0
const surfaceEl = document.getElementById('surface');
const surfaceErrorEl = document.querySelector('[name="surface"] + .error');
surfaceEl.addEventListener('input', function() {
    console.log('surface')
    const surfaceText = surfaceEl.value;

    if (surfaceText.length < 0 || isNaN(Number(surfaceText)) || Number(surfaceText) <= 0) {
        surfaceErrorEl.style.display = 'block';
        surfaceErrorEl.innerHTML = "Inserisci un numero positivo";
    } else {
        surfaceErrorEl.style.display = 'none';
    }
})

// ! ROOM
const n_roomEl = document.getElementById('n_room');
const n_roomErrorEl = document.querySelector('[name="n_room"] + .error');
n_roomEl.addEventListener('input', function() {
    const roomText = n_roomEl.value;

    if (roomText.length < 0 ||isNaN(Number(roomText)) || Number(roomText) <= 0) {
        n_roomErrorEl.style.display = 'block';
        n_roomErrorEl.innerHTML = "Inserisci un numero positivo";
    } else {
        n_roomErrorEl.style.display = 'none';
    }
})

// ! BED
const n_bedEl = document.getElementById('n_bed');
const n_bedErrorEl = document.querySelector('[name="n_bed"] + .error');
n_bedEl.addEventListener('input', function() {
    const bedText = n_bedEl.value;

    if (bedText.length < 0 ||isNaN(Number(bedText)) || Number(bedText) <= 0) {
        n_bedErrorEl.style.display = 'block';
        n_bedErrorEl.innerHTML = "Inserisci un numero positivo";
    } else {
        n_bedErrorEl.style.display = 'none';
    }
})

// ! BATH
const n_bathEl = document.getElementById('n_bath');
const n_bathErrorEl = document.querySelector('[name="n_bath"] + .error');
n_bathEl.addEventListener('input', function() {
    const bathText = n_bathEl.value;

    if (bathText.length < 0 ||isNaN(Number(bathText)) || Number(bathText) <= 0) {
        n_bathErrorEl.style.display = 'block';
        n_bathErrorEl.innerHTML = "Inserisci un numero positivo";
    } else {
        n_bathErrorEl.style.display = 'none';
    }
})

// ! PRICE
const priceEl = document.getElementById('price');
const priceErrorEl = document.querySelector('[name="price"] + .error');
priceEl.addEventListener('input', function() {
    const priceText = priceEl.value;

    if (priceText.length < 0 ||isNaN(Number(priceText)) || Number(priceText) <= 0) {
        priceErrorEl.style.display = 'block';
        priceErrorEl.innerHTML = "Inserisci un numero positivo";
    } else {
        priceErrorEl.style.display = 'none';
    }
})
