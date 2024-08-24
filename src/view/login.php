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
            <form id="form" class="form-login d-flex flex-column justify-content-center align-items-center h-100 w-100" action="../controller/LoginController.php" method="post">
                <h1 class="pb-5">LOGIN</h1>
                <div class="form-group w-50 pb-4">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Informe o e-mail" value="<?= $_POST ? $_POST['email'] : '' ?>" autofocus>
                    <div id="email_feedback" class="invalid-feedback"></div>
                </div>
                <div class="form-group w-50 pb-4">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Informe a senha" value="<?= $_POST ? $_POST['password'] : '' ?>">
                    <div id="senha_feedback" class="invalid-feedback"></div>
                </div>
                <button class="btn btn-dark w-50 mt-3 py-2" id="btn-login">
                    Entrar
                </button>
                <a href="#" class="pt-3">Esqueceu a senha?</a>
                <a href="/src/view/cadastro.php" class="pt-3">Não possui conta? Cadastre-se</a>
            </form>
        </section>
    </main>
</body>
</html>