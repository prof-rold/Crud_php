<!DOCTYPE html>
<?php
    $acaoB = 'read';
    require 'bairro_controller.php';  
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
                form.action = 'bairro_controller.php?acaoB=update'
                form.method = 'post'
                form.className = 'row'

                //criar um input para entrada do texto
                let input = document.createElement ('input')
                input.type = 'text'
                input.name = 'nome_bairro'
                input.className = 'col-8 form-control'
                input.value = txt

                //criar um input oculto para guardar o id do bairro
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

                //selecionar a div "bairro"
                let bairro = document.getElementById('bairro_'+id)

                //limpar o texto para inclusao do form
                bairro.innerHTML = ''

                //incluir form na pagina
                bairro.insertBefore(form, bairro[0])
            }
            function remover(id) {
                location.href = 'lista_bairro.php?acaoB=delete&id='+id
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
                    <a class="nav-link" href="../estado/novo_estado.php">Novo Estado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cidade/nova_cidade.php">Nova Cidade</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="novo_bairro.php">Novo Bairro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logradouro/novo_logradouro.php">Novo Logradouro</a>
                </li>
            </ul>
        </nav>
        <!-- nav end -->

        </br>
    
        <!-- lista bairros -->
        <?php foreach($bairros as $indice => $bairro) { ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div id="bairro_<?=$bairro->id?>">
                        <?= $bairro->nome_bairro ?>
                    </div>
                    <div>
                        <span><?= $bairro->nome_cidade ?> | </span>
                        <button class="btn btn-danger" onclick="remover(<?=$bairro->id?>)">Remover</button>
                        <button class="btn btn-primary" onclick="editar(<?=$bairro->id?>, '<?= $bairro->nome_bairro ?>')">Editar</button>
                    </div>
                </li>
            </ul>
        <?php } ?>
        <!-- lista bairros -->
    </body>
</html>