document.addEventListener('submit', () => {
    event.preventDefault();

    // hide all the error elements
    const errorEls = Array(document.getElementsByClassName('error'));
    errorEls.forEach((el,index) => {
        console.log(el)
        el.style.display = "none";
    });

    validate();
})

function validate() {
    const form = document.getElementById('form'); // select the form
    const formData = {};

    // take all the data
    for (let i = 0; i < form.elements.length; i++) {
        const element = form.elements[i];

        if (element.name) {
            formData[element.name] = element.value; // if has a name, save in the object
        }
    }

    console.log(formData);

    // validation
    if (formData.address == "") {
        const errorEl = document.querySelector('[name="address"] + .error');
        errorEl.style.display = 'block';
    }

}
