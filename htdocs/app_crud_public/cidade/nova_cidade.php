<!DOCTYPE html>
<?php
    $acaoE = 'read';
    require '../estado/estado_controller.php';  
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
                <li class="nav-item">
                    <a class="nav-link" href="../estado/novo_estado.php">Novo Estado</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Nova Cidade</a>
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
                <h5>Cidade inserida com sucesso!</h5>
            </div>
        <?php } ?>
        <!-- feedback inserção -->

        <br/>

        <!-- form -->
        <div class="container align-itens-center">
            <form method="post" action="cidade_controller.php?acaoC=create">
                <div class="row">
                    <div class="col-10 form-group">
                        <input type="text" class="form-control" placeholder="Inserir cidade:" name="nome_cidade" required>
                        <small class="form-text"><a href="lista_cidade.php">Editar cidades</a></small>
                    </div>
                    <div class="col-2 form-group">
                        <input type="submit" class="form-control button btn-primary">
                    </div>
                </div>
                <!-- check de estados -->
                <?php foreach($estados as $indice => $estado) { ?>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="check_estado_<?=$estado->id?>" name="id_estado" value="<?=$estado->id?>" required>
                        <label class="form-check-label" for="check_estado_<?=$estado->id?>"><?=$estado->nome_estado?></label>
                    </div>
                    <br>
                <?php } ?>
                <!-- check de estados end -->
            </form>
        </div>
        <!-- form end -->
    </body>
</html>