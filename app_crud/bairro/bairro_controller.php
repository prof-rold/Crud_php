<?php
    require '../../../app_crud/bairro/bairro_model.php';
    require '../../../app_crud/bairro/bairro_service.php';
    require '../../../app_crud/conexao.php';

    $acaoB = isset($_GET['acaoB']) ? $_GET['acaoB'] : $acaoB;

    if($acaoB == 'create') {
        $bairro = new Bairro();
        $bairro->__set('nome_bairro', $_POST['nome_bairro']);
        $bairro->__set('id_cidade', $_POST['id_cidade']);

        $conexao = new Conexao();

        $bairroService = new BairroService($conexao, $bairro);
        $bairroService->create();

        header('Location: novo_bairro.php?inclusao=1'); 
    }else if ($acaoB == 'read') {
        $bairro = new Bairro();

        $conexao = new Conexao ();

        $bairroService = new BairroService($conexao, $bairro);
        $bairros = $bairroService->read();
    }else if ($acaoB == 'update'){
        $bairro = new Bairro();
        $bairro->__set('id', $_POST['id']);
        $bairro->__set('nome_bairro', $_POST['nome_bairro']);

        $conexao = new Conexao();

        $bairroService = new BairroService($conexao, $bairro);
        if($bairroService->update()){
            header('location: lista_bairro.php');
        }
    }else if ($acaoB == 'delete') {
        $bairro = new Bairro();
        $bairro->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $bairroService = new BairroService($conexao, $bairro);
        $bairroService->delete();

        header('location: lista_bairro.php');
    }
?>