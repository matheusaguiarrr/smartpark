window.onload = function() {
    var form = document.getElementById("form");
    form.addEventListener("submit", verifica);
}

function verifica(event) {
    var email = document.getElementById("email");
    var senha = document.getElementById("senha");
    if (email.value == "" && senha.value == "") {
        email.classList.add("is-invalid");
        senha.classList.add("is-invalid");
        event.preventDefault();
    } else {
        if (email.value == "") {
            email.classList.add("is-invalid");
            event.preventDefault();
        } // else if (!validarEmail(email.value)) {
        //     email.classList.add("is-invalid");
        //     event.preventDefault();
        // }
        if (senha.value == "") {
            senha.classList.add("is-invalid");
            event.preventDefault();
        }
    }
}