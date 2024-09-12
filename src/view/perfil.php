        <section id="conteudo">
            <div class="container w-75 py-5">
                <?php include(TEMPLATES_PATH . '/mensagem.php'); ?>
                <h1>Perfil</h1>
                <form id="form" class="form-login w-100" action="../controller/PerfilController.php" method="post">
                    <?php
                        if(!is_null($usuario->getImagem())){
                            $imagem = $usuario->getImagem();
                            echo "<img id='image' src='../../src/imagens/users/$imagem' alt=''>";
                        } else {
                            echo "<img id='image' src='../../public/assets/img/user-image.webp' alt=''>";
                        }
                    ?>
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
                    <button type="button" name="editar" value="<?php echo $usuario->getId(); ?>" class="btn-update-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                </form>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar perfil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="form" class="form-login" action="../controller/PerfilController.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="idModal">
                        <div class="row">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" id="foto" name="foto">
                                <div id="foto_feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nomeModal" name="nome" placeholder="Informe o Nome" autofocus>
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefoneModal" name="telefone" placeholder="Informe o telefone">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-delete-lg" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" name="editar" class="btn-register">Salvar</button>
                        </div>      
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script defer src="../../public/assets/js/perfil.js"></script>
    </body>
</html>