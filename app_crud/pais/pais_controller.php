<?php
    //testando o require
    //echo "chegamos até aqui";

    //testando o $_POST
    //print_r($_POST);
    //ao fazer esse teste a super global post está assim: Array ( [nome] => País 1 )
    //ela é um array e o nome do indíce é o name do input que colocamos no html, nesse caso nome

    //vamos fazer os requires da nossa classe, conexao e service
    //atenção, os requires estão no contexto do diretório público
    require '../../../app_crud/pais/pais_model.php';
    require '../../../app_crud/pais/pais_service.php';
    require '../../../app_crud/conexao.php';

    //verificamos se $_GET[acao] existe, caso não, vamos usar uma váriável qualquer com o mesmo nome ($acao)
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    //verificamos a $acao e passamos tudo isso para o PaisService que vai criar nossas querys
    if($acao == 'create') {
        $pais = new Pais();
        $pais->__set('nome', $_POST['nome']);

        $conexao = new Conexao();

        $paisService = new PaisService($conexao, $pais);
        $paisService->create();

        //voltamos para novo_pais e passamos por GET que o pais foi incluído e que deu tudo certo
        header('Location: novo_pais.php?inclusao=1');
    }else if ($acao == 'read') {
        $pais = new Pais();

        $conexao = new Conexao ();

        $paisService = new PaisService($conexao, $pais);
        //pegar o retorno e criar um array paises que tem esse retorno
        $paises = $paisService->read();
    }else if ($acao == 'update') {
        $pais = new Pais();
        $pais->__set('id', $_POST['id']);
        $pais->__set('nome', $_POST['nome']);

        $conexao = new Conexao();

        $paisService = new PaisService($conexao, $pais);
        if($paisService->update()){
            header('location: lista_pais.php');
        }
    }else if ($acao == 'delete') {
        $pais = new Pais();
        $pais->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $paisService = new PaisService($conexao, $pais);
        $paisService->delete();

        header('location: lista_pais.php');
    }
?>