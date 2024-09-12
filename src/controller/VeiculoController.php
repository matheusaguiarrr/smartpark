<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Veiculo.php';
    require_once '../model/Motorista.php';
    require_once '../model/Estacionamento.php';
    require_once '../config/load.php';
    require_once '../config/util.php';
    $motoristas = Motorista::listar();
    $veiculos = Veiculo::listarTodos();
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    if(isset($_POST['cadastrar'])){
        $veiculo = new Veiculo($_POST['motorista'], $_POST['cor'], $_POST['ano'], $_POST['marca'], $_POST['modelo'], $_POST['categoria'], $_POST['placa']);
        $veiculo->cadastrar();
        addSuccessMensage('Veículo cadastrado com sucesso!');
        header('Location: VeiculoController.php');
        return false;
    }
    if(isset($_POST['buscar'])){
        $veiculo = Veiculo::listarUm($_POST['id']);
        echo json_encode(
            [
                'id' => $veiculo->getId(),
                'motorista' => $veiculo->getMotorista(),
                'cor' => $veiculo->getCor(),
                'ano' => $veiculo->getAno(),
                'marca' => $veiculo->getMarca(),
                'modelo' => $veiculo->getModelo(),
                'categoria' => $veiculo->getCategoria(),
                'placa' => $veiculo->getPlaca()
            ]);
        return false;
    }
    if(isset($_POST['editar'])){
        $veiculo = new Veiculo($_POST['motoristaModal'], $_POST['corModal'], $_POST['anoModal'], $_POST['marcaModal'], $_POST['modeloModal'], $_POST['categoriaModal'], $_POST['placaModal']);
        $veiculo->setId($_POST['id']);
        $veiculo->atualizar();
        addSuccessMensage('Veículo atualizado com sucesso!');
        header('Location: VeiculoController.php');
        //return false pois o header executará o redirecionamento depois de executar todo o script
        return false;
    }
    if(isset($_POST['excluir'])){
        $veiculo = Veiculo::listarUm($_POST['id']);
        $veiculo->excluir();
        addSuccessMensage('Veículo excluído com sucesso!');
        header('Location: VeiculoController.php');
        return false;
    }
    if(!is_null($estacionamento) && !is_null($veiculos) && !is_null($motoristas)){
        foreach($veiculos as $veiculo){
            $motorista = Motorista::buscarPorId($veiculo->motorista);
            $veiculo->motorista = $motorista->getNome();
        }
        loadTemplateView('veiculo', ['estacionamento' => $estacionamento, 'veiculos' => $veiculos, 'motoristas' => $motoristas]);
    }
    else if(!is_null($veiculos) && !is_null($motoristas)){
        foreach($veiculos as $veiculo){
            $motorista = Motorista::buscarPorId($veiculo->motorista);
            $veiculo->motorista = $motorista->getNome();
        }
        loadTemplateView('veiculo', ['veiculos' => $veiculos, 'motoristas' => $motoristas]);
    }
    else if(!is_null($estacionamento) && !is_null($motoristas)){
        loadTemplateView('veiculo', ['estacionamento' => $estacionamento, 'motoristas' => $motoristas]);
    }
    else if(!is_null($estacionamento)){
        loadTemplateView('veiculo', ['estacionamento' => $estacionamento]);
    }
    elseif(!is_null($motoristas)){
        loadTemplateView('veiculo', ['motoristas' => $motoristas]);
    }
    else {
        loadTemplateView('veiculo');
    }