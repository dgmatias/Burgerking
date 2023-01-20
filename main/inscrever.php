<?php
    require 'config.php';
    include 'head.php';
?>

<body>
    <div class="container">

        <div>
            <h1> Adicionar Usuário </h1>
        </div>

        <form action="cadastrar_login.php" method="post">
            <label for="">
                Nome: <br/>
                <input type="text" name="name" class="form-control">
            </label><br/><br/>

            <label for="">
                E-mail: <br/>
                <input type="email" name="email" class="form-control">
            </label><br/><br/>

            <label for="">
                Senha: <br/>
                <input type="password" name="senha" class="form-control">
            </label><br/><br/>

            <label for="">
                Confirmar a senha: <br/>
                <input type="password" name="confirm_senha" class="form-control">
            </label><br/><br/>

            <input type="submit" value="Adicionar" class="btn btn-primary">
        </form>

    </div>
</body>