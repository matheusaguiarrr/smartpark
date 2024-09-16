<?php
    isset($vagas) ? $vagas : $vagas = null;
    isset($estacionamento) ? $estacionamento : $estacionamento = null;
?>
<main>
    <section id="menu">
        <nav>
            <?php
                if(!is_null($estacionamento)){
                    $imagem = $estacionamento->getImagem();
                    echo "<img src='/src/imagens/$imagem' alt='Logo Estacionamento'>";
                }
            ?>
            <ul class="list-group">
                <li <?php if(is_null($vagas)) echo "class='list-group-item disabled'"; ?>>
                    <a href="IndexController.php">
                        <i class="icon fa-solid fa-house"></i>
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="EstacionamentoController.php">
                        <i class="icon fa-solid fa-warehouse"></i>
                        <span class="menu-text">Estacionamento</span>
                    </a>
                </li>
                <li <?php if(is_null($estacionamento)) echo "class='list-group-item disabled'"; ?>>
                    <a href="VagaController.php">
                        <i class="icon fa-solid fa-parking"></i>
                        <span class="menu-text">Vagas</span>
                    </a>
                <li <?php if(is_null($vagas)) echo "class='list-group-item disabled'"; ?>>
                    <a href="VeiculoController.php">
                        <i title="Veículos" class="icon fa-solid fa-car-side"></i>
                        <span class="menu-text">Veículos</span>
                    </a>
                </li>
                <li <?php if(is_null($vagas)) echo "class='list-group-item disabled'"; ?>>
                    <a href="MotoristaController.php">
                        <i class="icon fa-solid fa-id-card"></i>
                        <span class="menu-text">Motoristas</span>
                    </a>
                </li>
                <li>
                    <a href="PerfilController.php">
                        <i class="icon fa-solid fa-user" href="PerfilController.php"></i>    
                        <span class="menu-text">Perfil</span>
                    </a>
                </li>
            </ul>
        </nav>
        <button id="btn-menu"><i class="fa-solid fa-chevron-left"></i></button>
    </section>