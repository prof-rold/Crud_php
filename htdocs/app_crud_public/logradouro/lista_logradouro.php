<!DOCTYPE html>
<?php
    $acaoL = 'read';
    require 'logradouro_controller.php';  
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
                form.action = 'logradouro_controller.php?acaoL=update'
                form.method = 'post'
                form.className = 'row'

                //criar um input para entrada do texto
                let input = document.createElement ('input')
                input.type = 'text'
                input.name = 'nome_logradouro'
                input.className = 'col-8 form-control'
                input.value = txt

                //criar um input oculto para guardar o id do logradouro
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

                //selecionar a div "logradouro"
                let logradouro = document.getElementById('logradouro_'+id)

                //limpar o texto para inclusao do form
                logradouro.innerHTML = ''

                //incluir form na pagina
                logradouro.insertBefore(form, logradouro[0])
            }
            function remover(id) {
                location.href = 'lista_logradouro.php?acaoL=delete&id='+id
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
                    <a class="nav-link" href="../bairro/novo_bairro.php">Novo Bairro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="novo_logradouro.php">Novo Logradouro</a>
                </li>
            </ul>
        </nav>
        <!-- nav end -->

        </br>
    
        <!-- lista logradouros -->
        <?php foreach($logradouros as $indice => $logradouro) { ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div id="logradouro_<?=$logradouro->id?>">
                        <?= $logradouro->nome_logradouro ?>
                    </div>
                    <div>
                        <span><?= $logradouro->nome_bairro ?> | </span>
                        <button class="btn btn-danger" onclick="remover(<?=$logradouro->id?>)">Remover</button>
                        <button class="btn btn-primary" onclick="editar(<?=$logradouro->id?>, '<?= $logradouro->nome_logradouro ?>')">Editar</button>
                    </div>
                </li>
            </ul>
        <?php } ?>
        <!-- lista logradouros -->
    </body>
</html>