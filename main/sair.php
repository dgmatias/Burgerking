<?php
session_start();
ob_start();
unset($_SESSION['id'], $_SESSION['nome']);

//mensagem
$_SESSION['msg'] = "<p style='color: green'>Deslogado com sucesso!</p>";

header("Location: index.php");
exit;