window.onload = function() {
    let form = document.getElementById("form");
    form.addEventListener("submit", verifica);
}

function verifica(event) {
    let email = document.getElementById("email");
    let senha = document.getElementById("senha");
    let emailInvalido = document.getElementById("email_feedback");
    let senhaInvalida = document.getElementById("senha_feedback");
    if (email.value == "" && senha.value == "") {
        emailInvalido.innerHTML = "O e-mail é obrigatório";
        email.classList.add("is-invalid");
        senhaInvalida.innerHTML = "A senha é obrigatória";
        senha.classList.add("is-invalid");
        event.preventDefault();
    } else {
        if (email.value == "") {
            emailInvalido.innerHTML = "O e-mail é obrigatório";
            email.classList.add("is-invalid");
            event.preventDefault();
        } else if (!validarEmail(email.value)) {
            email.classList.add("is-invalid");
            event.preventDefault();
        }
        if (senha.value == "") {
            senhaInvalida.innerHTML = "A senha é obrigatória";
            senha.classList.add("is-invalid");
            event.preventDefault();
        }
    }
}

function validarEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}