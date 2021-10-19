<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="sistemaEstoque.php">Home</a></li>
                    <li><a href="editar.php">Editar</a></li>
                    <li><a href="inserir.php">Cadastrar</a></li>
                </ul>
            </nav>
        </header>
        <h1>Lista de Produtos</h1>    
    </body>
</html>

<?php
require 'config.php';
?>
<br>
<form method="POST" action="buscar.php"> 
        <label>Buscar Produto:</label>
        <input type="text" name="buscar" size="50" placeholder="Insira o nome do produto">
        <button>Buscar</button>
        <hr>
        <br>
 
<table border="1">  

        <th>Descrição</th>
        <th>Quantidade</th> 
        <th>Edição</th>
        <th>Exclusão</th>
    <tr>  
    <?php
    // Busca para Listagem dos dados
        $sql=$pdo->prepare("SELECT * FROM produto");   
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