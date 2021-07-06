<?php
    require '../../../app_crud/estado/estado_model.php';
    require '../../../app_crud/estado/estado_service.php';
    require '../../../app_crud/conexao.php';

    $acaoE = isset($_GET['acaoE']) ? $_GET['acaoE'] : $acaoE;

    if($acaoE == 'create') {
        $estado = new Estado();
        $estado->__set('nome_estado', $_POST['nome_estado']);
        $estado->__set('id_pais', $_POST['id_pais']);

        $conexao = new Conexao();

        $estadoService = new EstadoService($conexao, $estado);
        $estadoService->create();

        header('Location: novo_estado.php?inclusao=1'); 
    }else if ($acaoE == 'read') {
        $estado = new Estado();

        $conexao = new Conexao ();

        $estadoService = new EstadoService($conexao, $estado);
        $estados = $estadoService->read();
    }else if ($acaoE == 'update'){
        $estado = new Estado();
        $estado->__set('id', $_POST['id']);
        $estado->__set('nome_estado', $_POST['nome_estado']);

        $conexao = new Conexao();

        $estadoService = new EstadoService($conexao, $estado);
        if($estadoService->update()){
            header('location: lista_estado.php');
        }
    }else if ($acaoE == 'delete') {
        $estado = new Estado();
        $estado->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $estadoService = new EstadoService($conexao, $estado);
        $estadoService->delete();

        header('location: lista_estado.php');
    }
?>