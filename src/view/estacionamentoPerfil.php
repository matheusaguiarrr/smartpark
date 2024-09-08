        <section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Estacionamento</h1>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <p><?php echo $estacionamento->getNome(); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnpj">CNPJ</label>
                        <p><?php echo $estacionamento->getCnpj(); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="telefone">Telefone</label>
                        <p><?php echo $estacionamento->getTelefone(); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vagas">Quantidade de vagas</label>
                        <p><?php echo $estacionamento->getVagas(); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cep">CEP</label>
                        <p><?php echo $estacionamento->getCep(); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                        <p><?php echo $estacionamento->getEstado(); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade</label>
                        <p><?php echo $estacionamento->getCidade(); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bairro">Bairro</label>
                        <p><?php echo $estacionamento->getBairro(); ?></p>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $rua = $estacionamento->getRua();
                        $numero = $estacionamento->getNumero();
                        $complemento = $estacionamento->getComplemento();
                        if(!empty($estacionamento->getComplemento())){
                                echo "<div class='form-group col-md-4'>
                                        <label for='rua'>Rua</label>
                                        <p>$rua</p>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label for='numero'>Número</label>
                                        <p>$numero</p>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label for='complemento'>Complemento</label>
                                        <p>$complemento</p>
                                    </div>
                                </div>";
                        } else{
                            echo "<div class='form-group col-md-6'>
                                        <label for='rua'>Rua</label>
                                        <p>$rua</p>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='numero'>Número</label>
                                        <p>$numero</p>
                                    </div>";
                        }
                    ?>
                </div>
                <button type="button" name="editar" class="btn-update-lg" data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar estacionamento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="form" class="form-login" action="../controller/EstacionamentoController.php" method="post">
                        <input type="hidden" name="id" id="idModal">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" id="fotoModal" name="foto">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nomeModal" name="nome" placeholder="Informe o Nome" autofocus>
                                <div id="nome_feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" id="telefoneModal" name="telefone" placeholder="Informe o telefone">
                                <div id="telefone_feedback" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vagas">Quantidade de vagas</label>
                                <input type="number" id="vagasModal" name="vagas" placeholder="Informe a Quantidade de Vagas">
                                <div id="vagas_feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cep">CEP</label>
                                <input type="text" id="cepModal" name="cep" placeholder="Informe o CEP">
                                <div id="cep_feedback" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estado">Estado</label>
                                <input type="text" id="estadoModal" name="estado" placeholder="Informe o Estado">
                                <div id="estado_feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidadeModal" name="cidade" placeholder="Informe a Cidade">
                                <div id="cidade_feedback" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bairro">Bairro</label>
                                <input type="text" id="bairroModal" name="bairro" placeholder="Informe o Bairro">
                                <div id="bairro_feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="rua">Rua</label>
                                <input type="text" id="ruaModal" name="rua" placeholder="Informe a Rua">
                                <div id="rua_feedback" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numero">Número</label>
                                <input type="text" id="numeroModal" name="numero" placeholder="Informe o Número">
                                <div id="numero_feedback" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="complemento">Complemento</label>
                                <input type="text" id="complementoModal" name="complemento" placeholder="Informe o Complemento">
                                <div id="complemento_feedback" class="invalid-feedback"></div>
                            </div>
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
    <script defer src="../../public/assets/js/estacionamentoPerfil.js"></script>
</body>
