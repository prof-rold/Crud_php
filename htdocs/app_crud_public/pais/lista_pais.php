<!DOCTYPE html>
<!-- settar acao como read e require do controller para recuperar o array paises -->
<?php
    $acao = 'read';
    require 'pais_controller.php';  
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>App País</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script>
            function editar (id, txt) {
                //criar um form de edição
                let form = document.createElement('form')
                form.action = 'pais_controller.php?acao=update'
                form.method = 'post'
                form.className = 'row'

                //criar um input para entrada do texto
                let inputPais = document.createElement ('input')
                inputPais.type = 'text'
                inputPais.name = 'nome'
                inputPais.className = 'col-8 form-control'
                inputPais.value = txt

                //criar um input oculto para guardar o id do pais
                let inputId = document.createElement('input')
                inputId.type = 'hidden'
                inputId.name = 'id'
                inputId.value = id

                //criar um button para submit
                let button = document.createElement('button')
                button.type = 'submit'
                button.className = 'col-4 btn btn-secondary'
                button.innerHTML = 'Atualizar'

                //incluir os inputs e o button no form
                form.appendChild(inputPais)
                form.appendChild(inputId)
                form.appendChild(button)

                //selecionar a div "pais"
                let pais = document.getElementById('pais_'+id)

                //limpar o texto para inclusao do form
                pais.innerHTML = ''

                //incluir form na pagina
                pais.insertBefore(form, pais[0])
            }

            function remover (id) {
                location.href = 'lista_pais.php?acao=delete&id='+id
            }
        </script>
    </head>
    <body>
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">App país</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="novo_pais.php">Novo País</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../estado/novo_estado.php">Novo Estado</a>
                </li>
            </ul>
        </nav>
        <!-- nav end -->

        </br>
    
        <!-- lista paises com o array paises que criamos no controller -->
        <?php foreach($paises as $indice => $pais) { ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div id="pais_<?=$pais->id?>">
                        <?= $pais->nome ?>
                    </div>
                    <div>
                        <button class="btn btn-danger" onclick="remover(<?=$pais->id?>)"> Remover </button>
                        <button class="btn btn-primary" onclick="editar(<?=$pais->id?>, '<?= $pais->nome ?>')"> Editar </button>
                    </div>
                </li>
            </ul>
        <?php } ?>
        <!-- lista paises -->
    </body>
</html>