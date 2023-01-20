<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head.php';

    $lista = [];
    $sql = $pdo->query("SELECT * FROM produtos");

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    $codigo = filter_input(INPUT_GET, 'codigo');
    $produto = filter_input(INPUT_GET, 'produto');
    $preco = filter_input(INPUT_GET, 'preco');
    $quantidade = filter_input(INPUT_GET, 'quantidade');
    

    
        $lista = $pdo->query("SELECT * FROM produtos WHERE codigo LIKE '%$codigo%' and produto LIKE '%$produto%' and preco LIKE '%$preco%' and quantidade LIKE '%$quantidade%'");



    $user = [];
    $id = $_SESSION['id'];
    $sql = $pdo->query("SELECT * FROM usuarios WHERE id = $id ");

    if($sql->rowCount() > 0) {
        $user = $sql->fetch(PDO::FETCH_ASSOC);
      
    }  

?>

<header>
<link rel="stylesheet" href="./css/style.css">
<div class="cabecario">
        
         
          <table class="right">
           <tr>
           <td>
            <a style="margin-left: 34cm;" class="btn btn-primary" href="perfil_usuario.php"> Perfil do Usuário </a>
           </td><br/><br/>
       
           <td>
           <a href="./sair.php"
           onclick="return confirm('Tem certeza que deseja sair?')"
           class="btn btn-success"> 
           Sair 
           </a>
           </td>

           <td><img src="imagens/<?=$user['img'] ?>" width="90" heigth="90" ></td>
           </tr> 
          </table>
        </div>  
        <div class="oi">
        <center> <h1> Sistema de Estoque</h1> </center> 
        </div>
</header>

<body>

    <div class="container"><br/><br/>
    <h1>Home</h1>
          <h2>Bem-vindo, <?php echo $user['nome'] ?></h2>
       
        
           
          
       </div>


        <div class = "relatorio_registrar">
            <table>
                <tr>
                    <td>
                    <a class="btn btn-primary" href="registrar_produto.php"> Registrar Produto </a><br/><br/>
                    </td>
                    <td>
                    <a class="btn btn-primary" href="relatorio.php"> Relatório </a><br/><br/>
                    </td>
                </tr>
            </table>
        </div>


         <label>
            <p> Pesquisar: </p>
        </label>

        <form action="" method="get">
            <div class="d-flex">
                <input type="search" name="codigo" placeholder="buscar código" class="form-control">
                <input type="search" name="produto" placeholder="buscar produto" class="form-control">
                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
            </div>
        </form>
            
        <div>
            <table class="table">
                <tr>
                <th>IMAGEM</th>
                <th> CÓDIGO </th>
                <th> PRODUTO </th>
                <th> PREÇO UNIT </th>
                <th> QUANTIDADE</th>
                </tr>
                <?php foreach($lista as $produtosss): ?>
                    <tr>
                        <td><img src="imagens/<?php echo $produtosss['img'] ?>" width="90" heigth="90" ></td>
                        <td><?php echo $produtosss['codigo'] ?></td>
                        <td><?php echo $produtosss['produto'] ?></td>
                        <td><?php echo $produtosss['preco'] ?></td>
                        <td><?php echo $produtosss['quantidade'] ?></td>
                    

                    <td><a 
                     href="editar.php?id=<?=$produtosss['id']; ?>"
                     class="btn btn-success">
                     Editar
                    </a></td>

                    <td><a  
                    href="excluir.php?id=<?=$produtosss['id']; ?>"
                    onclick="return confirm('Tem certeza que deseja excluir:')"
                    class="btn btn-danger">
                    Excluir
                    </a></td>

                    <td><a  
                    href="perfil.php?id=<?=$produtosss['id']; ?>"
                    class="btn btn-danger">
                    Perfil
                    </a></td>
                    </tr>

          

                <?php endforeach; ?>

            </table>
        </div>


    </div>
</body>





        

                    
