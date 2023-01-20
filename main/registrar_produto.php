<?php
    require 'config.php';
    include 'head.php';

?>

<body style="margin-top: 2rem">  <!-- Formulário que resgata os valores para registro de um aluno -->
    <div class="container">

        <div>
            <h1> Registrar </h1><br/>
        </div>

 

        <form method="POST" action="registrar_action.php">
            <label for="">
                CÓDIGO: <br/>
                <input type="text" name="codigo" class="form-control">
            </label><br/><br/>

            <label for="">
                PRODUTO: <br/>
                <input type="text" name="produto" class="form-control">
            </label><br/><br/>

            <label for="">
                PREÇO:
                <input type="number" name="preco" class="form-control">
            </label><br/><br/>

            <label for="">
                QUANTIDADE: <br/>
                <input type="number" name="quantidade" class="form-control">
            </label><br/><br/>

            <label for="">
                QUANTIDADE MÍN: <br/>
                <input type="number" name="quantidade_min" class="form-control">
            </label><br/><br/>

  

            <input type="submit" value="Registrar" class="btn btn-primary">
            <a href="home.php" class="btn btn-danger"> Cancelar </a>
        </form>

    </div>
</body>