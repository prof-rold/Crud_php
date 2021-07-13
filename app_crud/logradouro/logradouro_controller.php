<?php
    require '../../../app_crud/logradouro/logradouro_model.php';
    require '../../../app_crud/logradouro/logradouro_service.php';
    require '../../../app_crud/conexao.php';

    $acaoL = isset($_GET['acaoL']) ? $_GET['acaoL'] : $acaoL;

    if($acaoL == 'create') {
        $logradouro = new Logradouro();
        $logradouro->__set('nome_logradouro', $_POST['nome_logradouro']);
        $logradouro->__set('id_bairro', $_POST['id_bairro']);

        $conexao = new Conexao();

        $logradouroService = new LogradouroService($conexao, $logradouro);
        $logradouroService->create();

        header('Location: novo_logradouro.php?inclusao=1'); 
    }else if ($acaoL == 'read') {
        $logradouro = new logradouro();

        $conexao = new Conexao ();

        $logradouroService = new LogradouroService($conexao, $logradouro);
        $logradouros = $logradouroService->read();
    }else if ($acaoL == 'update'){
        $logradouro = new Logradouro();
        $logradouro->__set('id', $_POST['id']);
        $logradouro->__set('nome_logradouro', $_POST['nome_logradouro']);

        $conexao = new Conexao();

        $logradouroService = new LogradouroService($conexao, $logradouro);
        if($logradouroService->update()){
            header('location: lista_logradouro.php');
        }
    }else if ($acaoL == 'delete') {
        $logradouro = new Logradouro();
        $logradouro->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $logradouroService = new LogradouroService($conexao, $logradouro);
        $logradouroService->delete();

        header('location: lista_logradouro.php');
    }
?>