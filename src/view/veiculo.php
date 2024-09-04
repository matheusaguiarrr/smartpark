        <section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Veículos</h1>
                <form id="form" class="form-login" action="../controller/VeiculoController.php" method="post">
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
                            <input type="text" id="cor" name="cor" placeholder="Informe a Cor">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ano">Ano</label>
                            <input type="text" id="ano" name="ano" placeholder="Informe o Ano">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="marca">Marca</label>
                            <input type="text" id="marca" name="marca" placeholder="Informe a Marca">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Modelo</label>
                            <input type="text" id="modelo" name="modelo" placeholder="Informe o Modelo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="categoria">Categoria</label>
                            <input type="text" id="categoria" name="categoria" placeholder="Informe a Categoria">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="placa">Placa</label>
                            <input type="text" id="placa" name="placa" placeholder="Informe a Placa">
                        </div>
                    </div>
                        <button type="submit" name="cadastrar" class="btn-register">Cadastrar</button>
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
                        echo "<th>Ações</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($veiculos as $veiculo){
                            echo "<tr>";
                            /**/
                            echo "<td>".$veiculo->motorista."</td>";
                            echo "<td>".$veiculo->cor."</td>";
                            echo "<td>".$veiculo->ano."</td>";
                            echo "<td>".$veiculo->marca."</td>";
                            echo "<td>".$veiculo->modelo."</td>";
                            echo "<td>".$veiculo->categoria."</td>";
                            echo "<td>".$veiculo->placa."</td>";
                            echo "<td>";
                            echo "<form action='../controller/VeiculoController.php' method='post'>";
                            echo "<input type='hidden' name='id' value='{$veiculo->id}'>";
                            echo "<button type='button' name='editar' value='{$veiculo->id}' class='btn-update-sm mx-3'  data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button>";
                            echo "<button type='submit' name='excluir' value='{$veiculo->id}' class='btn-delete-sm'>Excluir</button>";
                            echo "</form>";
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