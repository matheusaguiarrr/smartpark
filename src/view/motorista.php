        <section id="conteudo">
            <div class="container w-75 py-5">
                <h1 class="pb-3">Motoristas</h1>
                <form id="form" class="form-login" action="../controller/MotoristaController.php" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe o Nome" autofocus>
                            <div id="nome_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="Informe o CPF">
                            <div id="cpf_feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Informe o telefone">
                            <div id="telefone_feedback" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" name="cadastrar" class="btn-register">Cadastrar</button>
                </form>
                <?php
                    isset($motoristas) ? $motoristas : $motoristas = null;
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
                            echo "<button type='button' name='editar' value='{$motorista->id}' class='editar btn-update-sm mx-3'  data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button>";
                            echo "<button type='submit' name='excluir' value='{$motorista->id}' class='btn-delete-sm'>Excluir</button>";
                            echo "</form>";
                            echo "</td>";
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar motorista</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="form" class="form-login" action="../controller/MotoristaController.php" method="post">
                        <input type="hidden" name="id" id="idModal">
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
    <script defer src="../../public/assets/js/motorista.js"></script>
</body>
</html>