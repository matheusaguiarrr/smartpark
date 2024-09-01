    <div class="container w-75 py-5">
        <h1>Perfil</h1>
        <form id="form" class="form-login w-100" action="../controller/PerfilController.php" method="post">
            <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
            <img id="image" src="../../public/assets/img/logo.png" alt="">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe o Nome" value="<?php echo $usuario->getNome(); ?>" autofocus>
                    <div id="nome_feedback" class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" placeholder="Informe o telefone" value="<?php echo $usuario->getTelefone(); ?>">
                    <div id="telefone_feedback" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cpf">CPF</label>
                    <p><?php echo $usuario->getCpf(); ?></p>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <p><?php echo $usuario->getEmail(); ?></p>
                </div>
            </div>
        </form>
        <button type="submit" name="cadastrar" class="btn btn-primary px-5">Salvar</button>
    </div>