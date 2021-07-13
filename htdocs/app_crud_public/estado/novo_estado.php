<!DOCTYPE html>
<?php
    $acao = 'read';
    require '../pais/pais_controller.php';  
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>App País</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">App país</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../pais/novo_pais.php">Novo País</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Novo Estado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cidade/nova_cidade.php">Nova Cidade</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../bairro/novo_bairro.php">Novo Bairro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logradouro/novo_logradouro.php">Novo Logradouro</a>
                </li>
            </ul>
        </nav>
        <!-- nav end -->

        <!-- feedback inserção -->
        <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
            <div class="bg-success pt-2 text-white d-flex justify-content-center">
                <h5>Estado inserido com sucesso!</h5>
            </div>
        <?php } ?>
        <!-- feedback inserção -->

        <br/>

        <!-- form -->
        <div class="container align-itens-center">
            <form method="post" action="estado_controller.php?acaoE=create">
                <div class="row">
                    <div class="col-10 form-group">
                        <input type="text" class="form-control" placeholder="Inserir estado:" name="nome_estado" required>
                        <small class="form-text"><a href="lista_estado.php">Editar estados</a></small>
                    </div>
                    <div class="col-2 form-group">
                        <input type="submit" class="form-control button btn-primary">
                    </div>
                </div>
                <!-- check de paises -->
                <?php foreach($paises as $indice => $pais) { ?>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="check_pais_<?=$pais->id?>" name="id_pais" value="<?=$pais->id?>" required>
                        <label class="form-check-label" for="check_pais_<?=$pais->id?>"><?=$pais->nome_pais?></label>
                    </div>
                    <br>
                <?php } ?>
                <!-- check de paises end -->
            </form>
        </div>
        <!-- form end -->
    </body>
</html>