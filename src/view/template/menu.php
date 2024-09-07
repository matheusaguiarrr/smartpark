<main>
    <section id="menu">
        <nav>
            <?php
                if($estacionamento){
                    echo "
                
                        <img src='/src/imagens/$estacionamento->imagem' alt='Logo Estacionamento'>
                    ";
                }
            ?>
            <ul>
                <li>
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
                <li>
                    <a href="VeiculoController.php">
                        <i title="Veículos" class="icon fa-solid fa-car-side"></i>
                        <span class="menu-text">Veículos</span>
                    </a>
                </li>
                <li>
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