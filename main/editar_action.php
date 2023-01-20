<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $codigo = filter_input(INPUT_POST, 'codigo');
    $produto = filter_input(INPUT_POST, 'produto');  //Irá filtrar todos os novos valores do formulário e atribuí-los às variáveis.
    $preco = filter_input(INPUT_POST, 'preco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');

    if($id && $codigo && $produto && $preco && $quantidade ) {  //Irá checar se todos os valores existem.

        $sql = $pdo->prepare("UPDATE produtos SET codigo =:codigo, produto = :produto, preco = :preco, quantidade = :quantidade WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':codigo', $codigo);
        $sql->bindValue(':produto', $produto );
        $sql->bindValue(':preco',$preco );          //Atualiza o banco de dados com os novos valores.
        $sql->bindValue(':quantidade', $quantidade);
                
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header("Location: editar.php");
        exit;
    }

?>