<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/login.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- <script defer src="../../public/assets/js/jquery-3.5.1.min.js"></script> -->
    <script defer src="../../public/assets/js/login.js"></script>
    <title>SmartPark</title>
</head>
<body>
    <main>
        <section id="content" class="d-flex flex-column justify-content-center align-items-center h-100">
            <h1>SMARTPARK</h1>
            <p class="pt-3 w-75">Gerencie e otimize seu estacionamento com inteligência e eficiência.</p>
            <img src="../../public/assets/img/porsche.png" alt="background">
        </section>
        <section id="formulario">
            <form class="form-login d-flex flex-column justify-content-center align-items-center h-100 w-100" action="../controller/LoginController.php" method="post">
                <h1 class="pb-3">CADASTRO</h1>
                <div class="form-group w-50 pb-4">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Informe o seu nome" autofocus>
                </div>
                <div class="form-group w-50 pb-4">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Informe o seu cpf" autofocus>
                </div>
                <div class="form-group w-50 pb-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Informe o e-mail" autofocus>
                </div>
                <div class="form-group w-50 pb-4">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Informe o e-mail" autofocus>
                </div>
                <div class="form-group w-50 pb-4">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Informe a senha">
                </div>
                <div class="form-group w-50 pb-4">
                    <label for="password">Confirmação de Senha</label>
                    <input type="password" id="cfpassword" name="cfpassword" class="form-control" placeholder="Informe a senha novamente">
                    <div class="invalid-feedback">
                        As senhas não conferem
                    </div>
                </div>
                <button class="btn btn-dark w-50 mt-3 py-2" id="btn-login">
                    Cadastrar
                </button>
                <a href="/src/view/login.php" class="pt-3">Já possui conta? Conecte-se</a>
            </form>
        </section>
    </main>
</body>
</html>