<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/login.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- <script defer src="../../public/assets/js/jquery-3.7.1.min.js"></script> -->
    <script defer src="../../public/assets/js/cadastro.js"></script>
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
            <form id="form" class="form-login d-flex flex-column justify-content-center align-items-center h-100 w-100" action="../controller/CadastroController.php" method="post">
                <h1>CADASTRO</h1>
                <div class="container">
                    <div class="row">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe o seu nome" autofocus>
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="Informe o seu cpf" autofocus>
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Informe o e-mail" autofocus>
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="Informe o e-mail" autofocus>
                            <div id="email_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" placeholder="Informe a senha">
                            <div id="senha_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Confirmação de Senha</label>
                            <input type="password" id="cfsenha" name="cfsenha" placeholder="Informe a senha novamente">
                            <div id="cfsenha_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="cadastro" id="btn-register">
                    Cadastrar
                </button>
                <a href="/src/controller/LoginController.php">Já possui conta? Conecte-se</a>
            </form>
        </section>
    </main>
</body>
</html>