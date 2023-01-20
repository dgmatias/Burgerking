<?php
    require 'config.php';
  
    $codigo = filter_input(INPUT_POST, 'codigo');
    $produto = filter_input(INPUT_POST, 'produto');  //Filtra todos os valores enviados ao formulário.
    $preco = filter_input(INPUT_POST, 'preco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $quantidade_min = filter_input(INPUT_POST, 'quantidade_min');
   
   

    if($codigo && $produto && $preco && $quantidade && $quantidade_min ) {  //Checa se todos os valores são existentes.

        $sql = $pdo->prepare("INSERT INTO produtos (codigo, produto, preco, quantidade, quantidade_min) VALUES (:codigo, :produto, :preco, :quantidade, :quantidade_min)");
        $sql->bindValue(':codigo', $codigo);
        $sql->bindValue(':produto', $produto);
        $sql->bindValue(':preco', $preco);            //Insere os dados na tabela.
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':quantidade_min', $quantidade_min);
      
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header("Location: registrar_produto.php");
        exit;
    }



?> 