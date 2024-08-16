<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPark</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section id="menu">

        </section>
        <section id="conteudo">
            <h1>Titulo</h1>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>