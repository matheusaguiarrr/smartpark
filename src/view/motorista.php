        <section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Motoristas</h1>
                <form id="form" class="form-login mb-5" action="../controller/MotoristaController.php" method="post">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe o Nome" autofocus>
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="Informe o CPF">
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Informe o telefone">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                        <button type="submit" name="cadastrar" class="btn btn-primary col-md-2 ms-5">Cadastrar</button>
                    </div>
                </form>
                <?php
                    if(!is_null($motoristas)){
                        echo "<table class='table table-bordered'>";
                        echo "<thead class='table-dark'>";
                        echo "<tr>";
                        echo "<th>Nome</th>";
                        echo "<th>CPF</th>";
                        echo "<th>Telefone</th>";
                        echo "<th>Ações</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($motoristas as $motorista){
                            echo "<tr>";
                            echo "<td>".$motorista->nome."</td>";
                            echo "<td>".$motorista->cpf."</td>";
                            echo "<td>".$motorista->telefone."</td>";
                            echo "<td>";
                            echo "<form action='../controller/MotoristaController.php' method='post'>";
                            echo "<input type='hidden' name='id' value='{$motorista->id}'>";
                            echo "<button type='submit' name='editar' value='{$motorista->id}' class='btn btn-warning mx-3'>Editar</button>";
                            echo "<button type='submit' name='excluir' value='{$motorista->id}' class='btn btn-danger'>Excluir</button>";
                            echo "</form>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }
                    else {
                        echo "<p>Nenhum motorista cadastrado!</p>";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>