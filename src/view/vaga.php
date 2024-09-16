        <section id="conteudo">
            <div class="container w-75 py-5">
                <?php include(TEMPLATES_PATH . '/mensagem.php'); ?>
                <h1 class="pb-3">Vagas</h1>
                <form id="form" class="form-login" action="../controller/VagaController.php" method="post">
                    <input type="hidden" name="estacionamento" value="<?php $id = $estacionamento->getId(); echo $id; ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="identificador">Identificador</label>
                            <input type="text" id="identificador" name="identificador" placeholder="Informe o Identificador da vaga" autofocus>
                            <div id="identificador_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" name="cadastrar" class="btn-register">Adicionar</button>
                </form>
                <h2 class="py-3">Vagas Cadastradas</h2>
                <form id="form" class="form-login" action="../controller/VagaController.php" method="post">
                    <input type="hidden" name="estacionamento" value="<?php $id = $estacionamento->getId(); echo $id; ?>">
                    <div class="row">
                        <?php
                            if(!is_null($vagas)){
                                foreach($vagas as $vaga){
                                    if($vaga->getStatus() == "ocupado"){
                                        echo "<div class='container-vaga col-md-3 my-4 me-5'>";
                                        echo "<h3>".$vaga->getIdentificador()."</h3>";
                                    }
                                    elseif($vaga->getStatus() == "disponivel"){
                                        echo "<div class='container-vaga col-md-3 my-4 me-5'>";
                                        echo "<h3>".$vaga->getIdentificador()."</h3>";
                                        echo "<p>".$vaga->getStatus()."</p>";
                                    }
                                    else {
                                        echo "<div class='container-vaga col-md-3 my-4 me-5'>";
                                        echo "<input type='hidden' name='id' value='{$vaga->getId()}'>";
                                        echo "<p>Identificador: ".$vaga->getIdentificador()."</p>";
                                        echo "<p>Status: ".$vaga->getStatus()."</p>";
                                    }
                                    echo "<button type='button' value='{$vaga->getId()}' class='btn-vaga btn-vaga-update' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-rotate'></i></button>";
                                    echo "<button type='submit' value='{$vaga->getId()}' name='deletar' class='btn-vaga btn-vaga-delete'><i class='fa-solid fa-trash-can'></i></button>";
                                    echo "</div>";
                                }
                            }
                            else {
                                echo "<p>Nenhuma vaga cadastrada</p>";
                            }
                        ?>
                    </div>
                </form>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar vaga</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" class="form-login" action="../controller/VagaController.php" method="post">
                                <input type="hidden" name="id" id="idModal">
                                <div class="form-group">
                                    <label for="identificador">Identificador</label>
                                    <input type="text" id="identificadorModal" name="identificador" placeholder="Informe o identificador da vaga" autofocus>
                                    <div id="identificador_feedback" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="statusModal">Status</label>
                                    <select name="status" id="statusModal">
                                        <option value="">------</option>
                                        <option value="disponivel">Disponível</option>
                                        <option value="indisponivel">Indisponível</option>
                                    </select>
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
    <script defer src="../../public/assets/js/vaga.js"></script>
</body>