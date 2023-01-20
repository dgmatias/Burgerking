<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head.php';

    $user = [];  //Cria uma variável que contém um array.

    $id = $_SESSION['id'];
    
    if($id) {
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");  //Seleciona todos os dados da tabela aluno onde ID possui um valor definido.
        $sql->bindValue(':id', $id);  //Atribui esse valor à variável.
        $sql->execute();
       

        if($sql->rowCount() > 0) {
            $user = $sql->fetch(PDO::FETCH_ASSOC);  //Coloca os valores, sem duplicá-los, no array criando anteriormente.
           

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

    <img src="imagens/<?=$user['img']; ?>" width="160" heigth="160" >                                                      
    
    <form action="recebedor_usuario.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$user['id']; ?>" />
        <label for="" class="form-label">
            Imagem: <br/>
            <input type="file" name="img" class="form-control">
        </label><br/>
    
        <input type="submit" value="Enviar">    
    </form><br/><br/>

    <form action="perfil_usuario_action.php" method="post">
        <input type="hidden" name="id" value="<?=$user['id']; ?>" />
        <div class="mb-3">
            <label for="" class="form-label">
                NOME: <br/>
                <input type="text" name="nome" value="<?=$user['nome']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                EMAIL: <br/>
                <input type="text" name="email" value="<?=$user['email']; ?>" class="form-control">
            </label><br/><br/>
        </div>
  
 
        <input type="submit" value="Salvar" class="btn btn-primary">
        <a href="home.php" class="btn btn-danger"> Cancelar </a>
    </form>
</div>