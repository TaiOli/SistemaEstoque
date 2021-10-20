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
    <header id="inserir">
        <nav>
            <ul>
                <li><a href="sistemaEstoque.php">Home</a></li>
                <li><a href="inserir.php">Cadastrar</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
<!-- Chamando configuração de conexao com o banco -->
<?php
require 'config.php';

//Verificação de clique no botão e inserindo dados na tabela
    if(isset($_POST['inserir'])){

        $descricao=$_POST['descricao'];
        $quantidade=$_POST['quantidade'];

        if(empty($descricao)){

            echo 'Campo descrição vazio!';

        }else if(empty($quantidade)){

             echo 'Campo quantidade vazio!';

        }else{
            $sql= $pdo->prepare("INSERT INTO produto(descricao,quantidade) VALUES (:descricao, :quantidade)");
            $sql ->bindParam(':descricao',$descricao);
            $sql ->bindParam(':quantidade',$quantidade);
            $sql->execute();
            header("Location:sistemaEstoque.php");
            $last_inserted=$pdo->lastInsertId();

        if($last_inserted>0){

            echo 'Adicionado com sucesso!';

        }else{

            echo 'Falha ao adicionar!';
        }
    }
}
?>

<h1>Cadastrar Produtos</h1>
<form method="POST" action="">
    <br>
    <p>
        <label for="descricao">Descricao:</label><br>
        <input type="text" name="descricao">
    </p>
    <p>
        <label for="quantidade">Quantidade:</label><br>
        <input type="number" name="quantidade">
    </p>
    <hr>
    <p>
        <input type="submit" value="Salvar" name="inserir">
    </p>
</form>
