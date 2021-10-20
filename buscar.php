<!-- Chamando configuração de conexão com o banco -->
<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<!-- Chamando página de estilo -->
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

<form method="POST" action="buscar.php">  
    <!-- Tabela -->
<table border="1" id="tabela">  

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