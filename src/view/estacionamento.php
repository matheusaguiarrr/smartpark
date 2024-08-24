        <section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Estacionamento</h1>
                <form id="form" class="form-login" action="../controller/CadastroController.php" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome">Proprietário</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Informe o seu nome">
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Quantidade de vagas</label>
                            <input type="number" id="telefone" name="telefone" class="form-control" placeholder="Informe a Quantidade de Vagas" autofocus>
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="cpf">CEP</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Informe o CEP">
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Estado</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Informe o Estado">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="cpf">Cidade</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Informe a Cidade">
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Rua</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Informe a Rua">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="form-group col-md-6">
                            <label for="cpf">Número</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Informe o Número">
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Complemento</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Informe o Complemento">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button class="btn btn-dark w-50 mt-5 mb-4 py-2" id="btn-login">
                        Salvar
                    </button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>