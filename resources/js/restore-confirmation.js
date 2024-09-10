const deleteEl = document.querySelectorAll('form.form-restore');

deleteEl.forEach((deleteFormElement) =>{

    deleteFormElement.addEventListener('submit', function(event){
        event.preventDefault();

        if (window.confirm('Sei sicuro di voler ripristinare ' + this.getAttribute("data-apartment-name") + "?") == true){
            this.submit();
        }

    });

});
