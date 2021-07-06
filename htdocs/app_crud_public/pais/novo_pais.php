<!DOCTYPE html>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Novo País</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../estado/novo_estado.php">Novo Estado</a>
                </li>
            </ul>
        </nav>
        <!-- nav end -->

        <br/>

        <!-- form -->
        <div class="container align-itens-center">
            <form method="" action="">
                <div class="row">
                    <div class="col-10 form-group">
                        <input type="text" class="form-control" placeholder="Inserir país:" name="nome_pais">
                        <small class="form-text"><a href="lista_pais.php">Editar países</a></small>
                    </div>
                    <div class="col-2 form-group">
                        <input type="submit" class="form-control button btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <!-- form end -->
    </body>
</html>