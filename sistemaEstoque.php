<!DOCTYPE html>
<html lang="pt-br">
<!-- chamando a folha de estilo -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<!-- Menu -->
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="sistemaEstoque.php">Home</a></li>
                    <li><a href="inserir.php">Cadastrar</a></li>
                </ul>
            </nav>
        </header>
        <!-- Titulo -->
        <h1>Lista de Produtos</h1>    
    </body>
</html>
<!-- chamando configurações de conexão com o banco -->
<?php
require 'config.php';
?>

<br>
<!-- Campo de Busca -->
<form method="POST" action="buscar.php"> 
        <label>Buscar Produto:</label>
        <input type="text" name="buscar" size="50" placeholder="Insira o nome do produto">
        <button>Buscar</button>
        <hr>
        <br>
 
<!-- Tabela -->
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