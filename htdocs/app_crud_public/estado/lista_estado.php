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
                <li class="nav-item">
                    <a class="nav-link" href="../pais/novo_pais.php">Novo País</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="novo_estado.php">Novo Estado</a>
                </li>
            </ul>
        </nav>
        <!-- nav end -->

        </br>
    
        <!-- lista paises -->
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    Nome do país
                </div>
                <div>
                    <span class="badge badge-secondary badge-pill">Editar</span>
                    <span class="badge badge-secondary badge-pill">Remover</span>
                </div>
            </li>
        </ul>
        <!-- lista paises end -->
    </body>
</html>