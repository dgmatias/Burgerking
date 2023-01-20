<?php
    require 'config.php';
    require 'head.php';

    $info = [];  //Cria uma variável que contém um array.

    $id = filter_input(INPUT_GET, 'id');  //Filtra os valores de ID no fomulário.
    
    if($id) {
        $sql = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");  //Seleciona todos os dados da tabela aluno onde ID possui um valor definido.
        $sql->bindValue(':id', $id);  //Atribui esse valor à variável.
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);  //Coloca os valores, sem duplicá-los, no array criando anteriormente.

        } else {
            header("Location: home.php");
            exit;
        }
    } else {
        header("Location: home.php");
        exit;
    }

   


?>
<div class="container">  <!-- Formulário que irá editar os valores do Aluno. -->
    <h1> Editar </h1>

    <img src="imagens/<?=$info['img']; ?>" width="160" heigth="160" >                                                      
    
    <form action="recebedor.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$info['id']; ?>" />
        <label for="" class="form-label">
            Imagem: <br/>
            <input type="file" name="img" class="form-control">
        </label><br/>
    
        <input type="submit" value="Enviar">    
    </form><br/><br/>

    <form action="editar_action.php" method="post">
        <input type="hidden" name="id" value="<?=$info['id']; ?>" />
        <div class="mb-3">
            <label for="" class="form-label">
                CÓDIGO: <br/>
                <input type="text" name="codigo" value="<?=$info['codigo']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                PRODUTO: <br/>
                <input type="text" name="produto" value="<?=$info['produto']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                PREÇO: <br/>
                <input type="number" name="preco" value="<?=$info['preco']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                QUANTIDADE: <br/>
                <input type="number" name="quantidade" value="<?=$info['quantidade']; ?>" class="form-control">
            </label><br/><br/>
        </div>
 
        <input type="submit" value="Salvar" class="btn btn-primary">
        <a href="home.php" class="btn btn-danger"> Cancelar </a>
    </form>
</div>