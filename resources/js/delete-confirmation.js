const deleteEl = document.querySelectorAll('form.form-delete');

deleteEl.forEach((deleteFormElement) =>{

    deleteFormElement.addEventListener('submit', function(event){
        event.preventDefault();

        if (window.confirm('Sei sicuro di voler eliminare ' + this.getAttribute("data-apartment-name") + "?") == true){
            this.submit();
        }

    });

});
