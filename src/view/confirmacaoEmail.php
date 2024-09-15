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
            <form id="form" action="../controller/ConfirmacaoEmailController.php" method="post">
                <h1>CONFIRMAÇÃO DE E-MAIL</h1>
                <?php include(TEMPLATES_PATH . '/mensagem.php'); ?>
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="codigo" id="codigo" name="codigo" placeholder="Informe o código de confirmação" value="<?= $_POST ? $_POST['codigo'] : '' ?>" autofocus>
                    <div id="codigo_feedback" class="invalid-feedback"></div>
                </div>
                <button type="submit" name="confirmacao" id="btn-login">
                    Confirmar
                </button>
                <a href="/src/controller/LoginController.php">Já confirmou seu e-mail? Login</a>
            </form>
        </section>
    </main>
</body>
</html>