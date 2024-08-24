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
        <section id="content" class="d-flex flex-column justify-content-center align-items-center h-100">
            <h1>SMARTPARK</h1>
            <p class="pt-3 w-75">Gerencie e otimize seu estacionamento com inteligência e eficiência.</p>
            <img src="../../public/assets/img/porsche.png" alt="background">
        </section>
        <section id="formulario">
            <form id="form" class="form-login d-flex flex-column justify-content-center align-items-center h-100 w-100" action="../controller/CadastroController.php" method="post">
                <h1 class="pb-3">CADASTRO</h1>
                <div class="container w-75">
                    <div class="row">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Informe o seu nome" autofocus>
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Informe o seu cpf" autofocus>
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Informe o e-mail" autofocus>
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Informe o e-mail" autofocus>
                            <div id="email_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" class="form-control" placeholder="Informe a senha">
                            <div id="senha_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Confirmação de Senha</label>
                            <input type="password" id="cfsenha" name="cfsenha" class="form-control" placeholder="Informe a senha novamente">
                            <div id="cfsenha_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark w-50 mt-5 mb-4 py-2" id="btn-login">
                    Cadastrar
                </button>
                <a href="/src/view/login.php">Já possui conta? Conecte-se</a>
            </form>
        </section>
    </main>
</body>
</html>