<?php
    require 'config.php';

    $id = filter_input(INPUT_GET, 'id');  //Irá filtrar o ID e atribuir à variável.

    if($id) {  //Checa se existe um id.
        $sql = $pdo->prepare("DELETE FROM produtos WHERE id = :id");  //Se prepara para deletar o ID do banco de dados.
        $sql->bindValue('id', $id);  //Assimila o valor da variável com o valor existente do ID.
        $sql->execute();  //Deleta o ID.
    }

    header("Location: home.php");  //Redireciona para a página Home.
    exit;

?>