const deleteForm = document.querySelectorAll("form.project-delete");

deleteForm.forEach((element) => {
    element.addEventListener('submit', function (event) {
        event.preventDefault();

        const dataForm = window.confirm(`sicuro di voler eliminare ${this.getAttribute("custom-data-name")}?`);

        if (dataForm === true) {
            this.submit();
        }
    })
})
