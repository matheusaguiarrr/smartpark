<section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Veículos</h1>
                <form id="form" class="form-login mb-5" action="../controller/MotoristaController.php" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="motorista">Motorista</label>
                            <select name="motorista" id="motorista">
                                <option value="">------</option>
                                <?php
                                    foreach($motoristas as $motorista){
                                        echo "<option value='{$motorista->id}'>{$motorista->nome}</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cor">Cor</label>
                            <input type="text" id="cor" name="cor" class="form-control" placeholder="Informe a Cor">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ano">Ano</label>
                            <input type="text" id="ano" name="ano" class="form-control" placeholder="Informe o Ano">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="marca">Marca</label>
                            <input type="text" id="marca" name="marca" class="form-control" placeholder="Informe a Marca">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Modelo</label>
                            <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Informe o Modelo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="categoria">Categoria</label>
                            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Informe a Categoria">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="placa">Placa</label>
                            <input type="text" id="placa" name="placa" class="form-control" placeholder="Informe a Placa">
                        </div>
                    </div>
                        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                </form>
                <?php
                    if(!is_null($veiculos)){
                        echo "<table class='table table-bordered'>";
                        echo "<thead class='table-dark'>";
                        echo "<tr>";
                        echo "<th>Motorista</th>";
                        echo "<th>Cor</th>";
                        echo "<th>Ano</th>";
                        echo "<th>Marco</th>";
                        echo "<th>Modelo</th>";
                        echo "<th>Categoria</th>";
                        echo "<th>Placa</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($veiculos as $veiculo){
                            echo "<tr>";
                            echo "<td>".$veiculo->motorista->nome."</td>";
                            echo "<td>".$veiculo->cor."</td>";
                            echo "<td>".$veiculo->ano."</td>";
                            echo "<td>".$veiculo->marca."</td>";
                            echo "<td>".$veiculo->modelo."</td>";
                            echo "<td>".$veiculo->categoria."</td>";
                            echo "<td>".$veiculo->placa."</td>";
                            echo "<td>";
                            echo "<a href='../controller/VeiculoController.php?editar={$veiculo->id}' class='btn btn-warning mx-3'>Editar</a>";
                            echo "<a href='../controller/VeiculoController.php?excluir={$veiculo->id}' class='btn btn-danger'>Excluir</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }
                    else {
                        echo "<p>Nenhum veiculo cadastrado!</p>";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>