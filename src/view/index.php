        <section id="conteudo">
            <div class="container">
                <div class="row">
                    <h1>Registrar Entrada</h1>
                </div>
                <div class="row">
                    <h1><?php echo $hoje = date('d/m/Y') ?></h1>
                    <form action="">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="placa">Motorista</label>
                                <input type="text" class="form-control" id="motorista" name="motorista" placeholder="Digite o nome do motorista">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="placa">Veículo</label>
                                <input type="text" class="form-control" id="veiculo" name="veiculo" placeholder="Digite o modelo do veículo">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="vaga">Vaga</label>
                                <input type="text" class="form-control" id="vaga" name="vaga" placeholder="Digite o número da vaga">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row pt-3">
                    <button class="btn btn-success w-25 mx-3">Registrar Entrada</button>
                    <button class="btn btn-info w-25 mx-3">Adicionar Motorista</button>
                    <button class="btn btn-danger w-25 mx-3">Adicionar Veículo</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>