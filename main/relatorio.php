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

  
    $produto = filter_input(INPUT_GET, 'produto');
   
    $quantidade = filter_input(INPUT_GET, 'quantidade');

	$quantidade_min = filter_input(INPUT_GET, 'quantidade_min');
    

    
        $lista = $pdo->query("SELECT * FROM produtos WHERE produto LIKE '%$produto%' and quantidade LIKE '%$quantidade%' and quantidade_min LIKE '%$quantidade_min%'");



    
 
?>

<body>
<button onclick="imprimirPagina();">Imprimir página</button>

<script>
	function imprimirPagina() {
		window.print();
	}
</script>
</body>
<a href="home.php" class="btn btn-danger"> Voltar </a>

<label>
        
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
                <th> PRODUTO </th>
                <th> QUANTIDADE</th>
				<th>QUANTIDADE MÍN</th>
				<th>FALTA</th>
                </tr>
                <?php foreach($lista as $produtosss): ?>
                    <tr>
                        <td><img src="imagens/<?php echo $produtosss['img'] ?>" width="90" heigth="90" ></td>
                        <td><?php echo $produtosss['produto'] ?></td>
                        <td><?php echo $produtosss['quantidade'] ?></td>
						<td><?php echo $produtosss['quantidade_min'] ?></td>
						<td><?php echo $produtosss['quantidade_min']  - $produtosss['quantidade'] ?></td>



						</tr>

          

<?php endforeach; ?>


</table>
</div>


</div>
</body>
