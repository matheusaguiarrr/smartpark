        <section id="conteudo">
            <div class="container w-75 py-5">
                <?php include(TEMPLATES_PATH . '/mensagem.php'); ?>
                <div class="row">
                    <h1>Registrar Entrada/Saída</h1>
                </div>
                <div class="row">
                    <h1><?php echo $hoje = date('d/m/Y') ?></h1>
                    <form id="form" class="form-login" action="../controller/IndexController.php" method="post">
                        <div class="row">
                            <?php
                            isset($vagas) ? $vagas : $vagas = null;
                            if(!is_null($vagas)){
                                foreach($vagas as $vaga){
                                    if($vaga->getStatus() == "ocupada"){ ?>
                                        <div class="container-vaga col-md-3 my-4 me-5">
                                            <h3><?= $vaga->getIdentificador() ?></h3>
                                            <p><?= $vaga->getStatus() ?></p>
                                            <button type="submit" value="<?= $vaga->getId() ?>" name="saida" class="btn-update-sm">Registrar Saída</button>
                                        </div>
                                    <?php }
                                    elseif($vaga->getStatus() == "disponivel"){ ?>
                                        <div class="container-vaga col-md-3 my-4 me-5">
                                        <h3><?= $vaga->getIdentificador() ?></h3>
                                        <p><?= $vaga->getStatus() ?></p>
                                        <button type="button" value="<?= $vaga->getId() ?>" name="entrada" class="btn-register-sm" data-bs-toggle='modal' data-bs-target='#exampleModal'>Registrar Entrada</button>
                                        </div>
                                    <?php }
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Entrada</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" class="form-login" action="../controller/IndexController.php" method="post">
                                <input type="hidden" name="id" id="idModal">
                                <div class="form-group">
                                    <label for="motorista">Motorista</label>
                                    <select name="motorista" id="motorista">
                                        <option value="">------</option>
                                        <?php
                                            if(!is_null($motoristas)){
                                                foreach($motoristas as $motorista){
                                                    echo "<option value='{$motorista->id}'>{$motorista->nome}</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" id="veiculos" style="display: none;">
                                    <label for="veiculo">Veículo</label>
                                    <select name="veiculo" id="veiculo">
                                        <option value="">------</option>
                                    </select>
                                </div>
                                <div style="display: none;" class="alert alert-warning" id="message"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-delete-lg" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" name="entrada" class="btn-register">Registrar</button>
                        </div>      
                            </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script defer src="../../public/assets/js/index.js"></script>
</body>
</html>