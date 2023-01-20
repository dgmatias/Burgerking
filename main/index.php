<?php
    session_start();
    ob_start(); //limpa o buffer de saída. Usado no redirecionamento.
    require 'head.php';
    require 'config.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    if(!empty($dados['Logar'])) {

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindParam(':email', $dados['email'], PDO::PARAM_STR); //PDO::PARAM_STR só aceitará string para passar para banco.
        $sql->execute();
       
        if(($sql) && ($sql->rowCount() != 0)) {
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            var_dump($resultado);
            //Verifica se tem algum email e conta a quantidade de linhas achadas deste email.
            if(password_verify($dados['senha'], $resultado['senha'])) {
                
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['nome'] = $resultado['nome'];
                header('Location: home.php');
                exit;

            } else {
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválidos!</p>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválidos!</p>";
        }

        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            //Destrói a mensagem para não imprimir na tela novamente
            unset($_SESSION['msg']);
        }

    } else {
        $_SESSION['msg'] = "erro";
    }
?>



<header>
    <link rel="stylesheet" href="./css/style_login.css">
</header>
<body>
    <div class="container">

        
        <div>
            </div>
            <img src="./imagens/bk22.png" alt="">
            
            <form action="" method="post">
                
                
            </br>
            <label for="">
                <!-- E-mail:  -->
                
                <input type="email"  placeholder="email"name="email" class="input" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>">
            </label><br/><br/>

            <label for="">
                <!-- Senha:-->
                <input type="password" name="senha"placeholder="senha"   class="input">
            </label><br/><br/>

            <input type="submit" value="Logar" name="Logar" class="botao"><br/><br/>

            <!-- <h5> Não tem uma conta? Crie a sua agora mesmo! </h5>
            <a href="./inscrever.php" class="btn btn-success"> Criar uma conta</a> -->
        </form>

    </div>
</body>