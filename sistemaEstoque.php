<?php
require 'config.php';
?>

<h1>Listagem de dados</h1>

<table border="1">  

        <th>Descricao</th>
        <th>Quantidade</th> 
        <th>Edição</th>
    <tr>
    <?php
    // Busca para Listagem dos dados
        $sql=$pdo->prepare("SELECT *FROM produto");
        $sql->execute();
           while($lista= $sql->fetch(PDO::FETCH_ASSOC)):
        ?>
            
            <tr><td><?php echo $lista["descricao"]; ?>
            <td><?php echo $lista["quantidade"]; ?></td>
            <td><a href="editProduto.php?desc=<?php echo $lista['descricao'];?>"class="btn btn-warning">Edit</a>   
        <?php
           endwhile;
        ?>
    </tr>
</table>

<a href="insertProdutos.php">Cadastrar Produtos</a>

