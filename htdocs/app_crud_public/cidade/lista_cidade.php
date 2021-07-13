<!DOCTYPE html>
<?php
    $acaoC = 'read';
    require 'cidade_controller.php';  
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
                form.action = 'cidade_controller.php?acaoC=update'
                form.method = 'post'
                form.className = 'row'

                //criar um input para entrada do texto
                let input = document.createElement ('input')
                input.type = 'text'
                input.name = 'nome_cidade'
                input.className = 'col-8 form-control'
                input.value = txt

                //criar um input oculto para guardar o id da cidade
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
                let cidade = document.getElementById('cidade_'+id)

                //limpar o texto para inclusao do form
                cidade.innerHTML = ''

                //incluir form na pagina
                cidade.insertBefore(form, cidade[0])
            }
            function remover(id) {
                location.href = 'lista_cidade.php?acaoC=delete&id='+id
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
                    <a class="nav-link" href="nova_cidade.php">Nova Cidade</a>
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

        </br>
    
        <!-- lista cidades -->
        <?php foreach($cidades as $indice => $cidade) { ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div id="cidade_<?=$cidade->id?>">
                        <?= $cidade->nome_cidade ?>
                    </div>
                    <div>
                        <span><?= $cidade->nome_estado ?> | </span>
                        <button class="btn btn-danger" onclick="remover(<?=$cidade->id?>)">Remover</button>
                        <button class="btn btn-primary" onclick="editar(<?=$cidade->id?>, '<?= $cidade->nome_cidade ?>')">Editar</button>
                    </div>
                </li>
            </ul>
        <?php } ?>
        <!-- lista estados -->
    </body>
</html>