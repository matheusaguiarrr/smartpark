    <div class="container w-75 py-5">
        <h1 class="pb-3">Perfil</h1>
        <form id="form" class="form-login w-100" action="../controller/PerfilController.php" method="post">
            <img src="teste.png" alt="">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Informe o Nome" autofocus>
                    <div id="nome_feedback" class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Informe o telefone">
                    <div id="telefone_feedback" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="row my-5">
                <div class="form-group col-md-4">
                    <p>CPF: <?php echo $usuario->getCpf(); ?></p>
                </div>
                <div class="form-group col-md-4">
                    <p>E-mail: <?php echo $usuario->getEmail(); ?></p>
                </div>
            </div>
        </form>
        <button type="submit" name="cadastrar" class="btn btn-primary px-5">Salvar</button>
    </div>