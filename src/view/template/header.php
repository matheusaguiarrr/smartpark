<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/default.css">
    <link rel="stylesheet" href="../../public/assets/css/components/header.css">
    <link rel="stylesheet" href="../../public/assets/css/components/menu.css">
    <link rel="stylesheet" href="../../public/assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap/css/bootstrap.css">
    <script defer src="../../public/assets/js/jquery-3.7.1.min.js"></script>
    <script defer src="../../public/assets/js/menu.js"></script>
    <script defer src="../../public/assets/js/estacionamento.js"></script>
    <script defer src="../../public/assets/js/motorista.js"></script>
    <title>SmartPark</title>
</head>
<body>
    <header class="d-flex align-items-center justify-content-between px-5">
        <img src="../../public/assets/img/logo.png" alt="" height="80px" width="120px">
        <form action="../controller/LogoutController.php" method="post">
            <button type="submit" id="btn-login" class="btn"><i class="fa-solid fa-right-from-bracket pe-2"></i>Sair</button>
        </form>
    </header>