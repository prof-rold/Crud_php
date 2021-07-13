<?php
    require '../../../app_crud/cidade/cidade_model.php';
    require '../../../app_crud/cidade/cidade_service.php';
    require '../../../app_crud/conexao.php';

    $acaoC = isset($_GET['acaoC']) ? $_GET['acaoC'] : $acaoC;

    if($acaoC == 'create') {
        $cidade = new Cidade();
        $cidade->__set('nome_cidade', $_POST['nome_cidade']);
        $cidade->__set('id_estado', $_POST['id_estado']);

        $conexao = new Conexao();

        $cidadeService = new CidadeService($conexao, $cidade);
        $cidadeService->create();

        header('Location: nova_cidade.php?inclusao=1'); 
    }else if ($acaoC == 'read') {
        $cidade = new Cidade();

        $conexao = new Conexao ();

        $cidadeService = new CidadeService($conexao, $cidade);
        $cidades = $cidadeService->read();
    }else if ($acaoC == 'update'){
        $cidade = new Cidade();
        $cidade->__set('id', $_POST['id']);
        $cidade->__set('nome_cidade', $_POST['nome_cidade']);

        $conexao = new Conexao();

        $cidadeService = new CidadeService($conexao, $cidade);
        if($cidadeService->update()){
            header('location: lista_cidade.php');
        }
    }else if ($acaoC == 'delete') {
        $cidade = new Cidade();
        $cidade->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $cidadeService = new CidadeService($conexao, $cidade);
        $cidadeService->delete();

        header('location: lista_cidade.php');
    }
?>