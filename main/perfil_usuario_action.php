<?php
    session_start();
    ob_start();
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');  //Irá filtrar todos os novos valores do formulário e atribuí-los às variáveis.
  

    if($id && $nome && $email) {  //Irá checar se todos os valores existem.

        $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email  WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email );
      
                
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header("Location: perfil_usuario.php");
        exit;
    }

?>