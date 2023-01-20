<?php
    session_start();
    ob_start();

require 'config.php';


$id = $_SESSION['id'];
echo "id: $id";
$permitidos = array('image/jpg', 'image/jpeg', 'image/png');

if(in_array($_FILES['img']['type'], $permitidos)) {
    $img = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], 'imagens/' .$img);
    
        $sql = $pdo->prepare("UPDATE usuarios SET img = :img WHERE id = :id");
        $sql->bindValue(':id' , $id);
        $sql->bindValue(':img', $img);
        $sql->execute();

    echo 'Arquivo salvo com sucesso!';
    
    header("Location: home.php");
    exit;
} 
else {
    echo 'Arquivo não permitido!';
    exit;
}

?>