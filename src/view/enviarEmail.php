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
        <section id="content">
            <h1>SMARTPARK</h1>
            <p>Gerencie e otimize seu estacionamento com inteligência e eficiência.</p>
            <img src="../../public/assets/img/porsche.png" alt="background">
        </section>
        <section id="formulario">
            <form id="form" action="../controller/EnvioEmailController.php" method="post">
                <h1>E-MAIL DE CONFIRMAÇÃO</h1>
                <?php include(TEMPLATES_PATH . '/mensagem.php'); ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Informe o e-mail" value="<?= $_POST ? $_POST['email'] : '' ?>" autofocus>
                    <div id="email_feedback" class="invalid-feedback"></div>
                </div>
                <button type="submit" name="enviar" id="btn-login">
                    Enviar
                </button>
                <a href="/src/controller/LoginController.php">Já confirmou seu e-mail? Login</a>
            </form>
        </section>
    </main>
</body>
</html>