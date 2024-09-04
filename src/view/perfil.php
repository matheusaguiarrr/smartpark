    <div class="container w-75 py-5">
        <h1>Perfil</h1>
        <form id="form" class="form-login w-100" action="../controller/PerfilController.php" method="post">
            <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
            <img id="image" src="../../public/assets/img/user-image.webp" alt="">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <p><?php echo $usuario->getNome(); ?></p>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <p><?php echo $usuario->getTelefone(); ?></p>
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
            <button type="submit" name="editar" class="btn-update-lg">Editar</button>
        </form>
    </div>