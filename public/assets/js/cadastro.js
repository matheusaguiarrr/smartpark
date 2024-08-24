window.onload = function() {
    let form = document.getElementById("form");
    form.addEventListener("submit", verifica);
    form.cpf.addEventListener("keypress", mascaraCPF);
    form.telefone.addEventListener("keypress", mascaraTelefone);
}

function verifica(event) {
    let nome = document.getElementById("nome");
    let cpf = document.getElementById("cpf");
    let telefone = document.getElementById("telefone");
    let email = document.getElementById("email");
    let senha = document.getElementById("senha");
    let confirmacaoSenha = document.getElementById("cfsenha");
    //----------------
    let nomeInvalido = document.getElementById("nome_feedback");
    let cpfInvalido = document.getElementById("cpf_feedback");
    let telefoneInvalido = document.getElementById("telefone_feedback");
    let emailInvalido = document.getElementById("email_feedback");
    let senhaInvalida = document.getElementById("senha_feedback");
    let cfSenhaInvalida = document.getElementById("cfsenha_feedback");
    let camposObrigatorios = 0;
    if (nome.value == "") {
        nomeInvalido.innerHTML = "<p>Nome é obrigatório</p>";
        nome.classList.add("is-invalid");
        camposObrigatorios++;
    }
    if (cpf.value == "") {
        cpfInvalido.innerHTML = "<p>CPF é obrigatório</p>";
        cpf.classList.add("is-invalid");
        camposObrigatorios++;
    } else if (!validarCPF(cpf.value)) {
        cpfInvalido.innerHTML = "<p>CPF inválido</p>";
        cpf.classList.add("is-invalid");
        camposObrigatorios++;
    }
    if (telefone.value == "") {
        telefoneInvalido.innerHTML = "<p>Telefone é obrigatório</p>";
        telefone.classList.add("is-invalid");
        camposObrigatorios++;
    }
    if (email.value == "") {
        emailInvalido.innerHTML = "<p>Email é obrigatório</p>";
        email.classList.add("is-invalid");
        camposObrigatorios++;
    } else if (!validarEmail(email.value)) {
        emailInvalido.innerHTML = "<p>Email inválido</p>";
        email.classList.add("is-invalid");
        camposObrigatorios++;
    }
    if (senha.value == "") {
        senhaInvalida.innerHTML = "<p>Senha é obrigatório</p>";
        senha.classList.add("is-invalid");
        camposObrigatorios++;
    }
    if (confirmacaoSenha.value == "") {
        cfSenhaInvalida.innerHTML = "<p>Confirmação de senha é obrigatório</p>";
        confirmacaoSenha.classList.add("is-invalid");
        camposObrigatorios++;
    } else if (senha.value != confirmacaoSenha.value) {
        cfSenhaInvalida.innerHTML = "<p>Senhas não conferem</p>";
        confirmacaoSenha.classList.add("is-invalid");
        camposObrigatorios++;
    }
    if (camposObrigatorios > 0) {
        event.preventDefault();
    }
}

function validarCPF(cpf){
    var soma = 0;
    var resto;
    var sempontoevirgula = cpf.replace(/,/g, "").replace(/\./g, "").replace(/\-/g, "");

    if(sempontoevirgula == '00000000000') return false;
    for(i=1; i<=9; i++) soma = soma + parseInt(sempontoevirgula.substring(i-1, i)) * (11 - i);
    resto = (soma * 10) % 11;

    if((resto == 10) || (resto == 11)) resto = 0;
    if(resto != parseInt(sempontoevirgula.substring(9, 10))) return false;

    soma = 0;
    for(i = 1; i <= 10; i++) soma = soma + parseInt(sempontoevirgula.substring(i-1, i))*(12-i);
    resto = (soma * 10) % 11;

    if((resto == 10) || (resto == 11)) resto = 0;
    if(resto != parseInt(sempontoevirgula.substring(10, 11))) return false;
    return true;
}

function validarEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function mascaraCPF(event){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.preventDefault();
    }
    if (this.value.length == 3){
        this.value = this.value + ".";
    }
    if (this.value.length == 7){
        this.value = this.value + ".";
    }
    if (this.value.length == 11){
        this.value = this.value + "-";
    }
    if (this.value.length >= 14){
        event.preventDefault();
    }
}

function mascaraTelefone(event){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.preventDefault();
    }
    if (this.value.length == 0){
        this.value = this.value + "(";
    }
    if (this.value.length == 3){
        this.value = this.value + ")";
    }
    if (this.value.length == 9){
        this.value = this.value + "-";
    }
    if (this.value.length >= 14){
        event.preventDefault();
    }
}