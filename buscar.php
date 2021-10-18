<?php
require 'config.php';
?>

<label>Buscar Produto:</label>
<input type="text" name="buscar" size="50" placeholder="Insira o nome do produto">
<button>Buscar</button>
<hr>

<form method="POST" action="buscar.php">  
<table border="1">  

        <th>Descrição</th>
        <th>Quantidade</th> 
        <th>Edição</th>
        <th>Exclusão</th>
    <tr>  
    <?php
    // Busca para Listagem dos dados

        $buscar=$_POST['buscar'];
        $sql=$pdo->prepare("SELECT * FROM produto WHERE descricao LIKE '$buscar' '%'");   
        $sql->execute();
        while($lista= $sql->fetch(PDO::FETCH_ASSOC)):   
    ?>        
            <tr><td><?php echo $lista["descricao"];?>
            <td><?php echo $lista["quantidade"];?></td>
            <td><a href="editar.php?id=<?php echo $lista["id"];?>"> Editar</a></td>  
            <td><a href="excluir.php?id=<?php echo $lista["id"];?>"> Excluir</a></td>  
        <?php      
           endwhile;
        ?> 
    </tr>
</table>

<br>
<a href="inserir.php">Cadastrar Produtos</a>
<br>
<br>
<a href="sistemaEstoque.php">Lista de Produtos</a>
