        <section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Estacionamento</h1>
                <form id="form" class="form-login" action="../controller/EstacionamentoController.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="foto">Foto</label>
                            <input type="file" id="foto" name="foto">
                            <div id="foto_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe o Nome" autofocus>
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" placeholder="Informe o CNPJ">
                            <div id="cnpj_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Informe o telefone">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vagas">Quantidade de vagas</label>
                            <input type="number" id="vagas" name="vagas" placeholder="Informe a Quantidade de Vagas">
                            <div id="vagas_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" placeholder="Informe o CEP">
                            <div id="cep_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado" placeholder="Informe o Estado">
                            <div id="estado_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" placeholder="Informe a Cidade">
                            <div id="cidade_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" placeholder="Informe o Bairro">
                            <div id="bairro_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-4">
                            <label for="rua">Rua</label>
                            <input type="text" id="rua" name="rua" placeholder="Informe a Rua">
                            <div id="rua_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numero">Número</label>
                            <input type="text" id="numero" name="numero" placeholder="Informe o Número">
                            <div id="numero_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complemento">Complemento</label>
                            <input type="text" id="complemento" name="complemento" placeholder="Informe o Complemento">
                            <div id="complemento_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" name="cadastrar" class="btn-register w-50">
                        Salvar
                    </button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>