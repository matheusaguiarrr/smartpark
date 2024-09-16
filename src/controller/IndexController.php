<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: LoginController.php');
    }
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../model/Vaga.php';
    require_once '../model/Veiculo.php';
    require_once '../model/Motorista.php';
    require_once '../model/Estacionamento.php';
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    if(!is_null($estacionamento)){
        $vagas = Vaga::listar($estacionamento->getId());
        $veiculos = Veiculo::listarTodos();
        $motoristas = Motorista::listar();
    }
    if(isset($_POST['entrada'])){
        $vaga = Vaga::buscarPorId($_POST['id']);
        Vaga::ocupar($vaga, $_POST['motorista'], $_POST['veiculo'], $_SESSION['id']);
        addSuccessMensage('Entrada registrada com sucesso');
        header('Location: IndexController.php');
        return false;
    }
    if(isset($_POST['saida'])){
        $vaga = Vaga::buscarPorId($_POST['saida']);
        $vaga->liberar($vaga, $_SESSION['id']);
        addSuccessMensage('Saída registrada com sucesso');
        header('Location: IndexController.php');
        return false;
    }
    if(isset($_POST['buscar'])){
        $veiculos = Veiculo::buscarPorMotorista($_POST['id']);
        $veiculosArray = [];
        if(!is_null($veiculos)){
            foreach($veiculos as $veiculo) {
                $veiculosArray[] = [
                    'id'        => $veiculo->getId(),
                    'modelo'    => $veiculo->getModelo()
                ];
            }
            echo json_encode($veiculosArray);
        }
        else{
            echo json_encode(['message' => 'O motorista não possui veículo cadastrado']);
        }
        return false;
    }
    if(is_null($estacionamento)){
        addWarningMensage('Cadastre os dados do seu estacionamento para continuar');
        header('Location: EstacionamentoController.php');
        return false;
    }
    if($estacionamento && !is_null($vagas) && !is_null($motoristas)){
        if(!is_null($veiculos)){
            loadTemplateView('index', ['estacionamento' => $estacionamento, 'vagas' => $vagas, 'veiculos' => $veiculos, 'motoristas' => $motoristas]);
        }
        loadTemplateView('index', ['estacionamento' => $estacionamento, 'vagas' => $vagas, 'motoristas' => $motoristas]);
    }
    if($estacionamento && !is_null($motoristas)){
        if(!is_null($veiculos)){
            loadTemplateView('index', ['estacionamento' => $estacionamento, 'veiculos' => $veiculos, 'motoristas' => $motoristas]);
        }
        loadTemplateView('index', ['estacionamento' => $estacionamento, 'motoristas' => $motoristas]);
    }
    if($estacionamento && !is_null($vagas)){
        loadTemplateView('index', ['estacionamento' => $estacionamento, 'vagas' => $vagas]);
    }
    if($estacionamento){
        loadTemplateView('index', ['estacionamento' => $estacionamento]);
    }
    else {
        loadTemplateView('index');
    }