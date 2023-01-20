<?php
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $confirm_senha = filter_input(INPUT_POST, 'confirm_senha');

    if($name && $email && $senha && $confirm_senha) {

        $sql = $pdo->prepare("select * from usuarios where email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        // //Verifico se tem um mesmo email já cadastrado.
        if($sql->rowCount() === 0) {
        //     //Verifico se a senha e a confirmação de senha são iguais.
            if($senha === $confirm_senha) {

                $password_hash = password_hash($senha, PASSWORD_DEFAULT);

                $sql = $pdo->prepare( "INSERT INTO usuarios (nome, email, senha) VALUES (:name, :email, :senha)" );
                $sql->bindValue(':name', $name);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', $password_hash);
                $sql->execute();

                 header("Location: index.php");
                 exit;
            } else {
                header("Location: inscrever.php");
                exit;
            }
        } else {
            header("Location: inscrever.php");
            exit;
        }
    } else {
        header("Location: inscrever.php");
        exit;
    }

?>