<!DOCTYPE html>
<?php
    $acaoE = 'read';
    require 'estado_controller.php';  
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
                form.action = 'estado_controller.php?acaoE=update'
                form.method = 'post'
                form.className = 'row'

                //criar um input para entrada do texto
                let input = document.createElement ('input')
                input.type = 'text'
                input.name = 'nome_estado'
                input.className = 'col-8 form-control'
                input.value = txt

                //criar um input oculto para guardar o id do estado
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
                form.appendChild(input)
                form.appendChild(inputId)
                form.appendChild(button)

                //selecionar a div "vinicola"
                let estado = document.getElementById('estado_'+id)

                //limpar o texto para inclusao do form
                estado.innerHTML = ''

                //incluir form na pagina
                estado.insertBefore(form, estado[0])
            }
            function remover(id) {
                location.href = 'lista_estado.php?acaoE=delete&id='+id
            }
        </script>
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
    
        <!-- lista estados -->
        <?php foreach($estados as $indice => $estado) { ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div id="estado_<?=$estado->id?>">
                        <?= $estado->nome_estado ?>
                    </div>
                    <div>
                        <span><?= $estado->nome_pais ?> | </span>
                        <button class="btn btn-danger" onclick="remover(<?=$estado->id?>)">Remover</button>
                        <button class="btn btn-primary" onclick="editar(<?=$estado->id?>, '<?= $estado->nome_estado ?>')">Editar</button>
                    </div>
                </li>
            </ul>
        <?php } ?>
        <!-- lista estados -->
    </body>
</html>