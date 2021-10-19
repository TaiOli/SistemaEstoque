<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
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
</body>
</html>

<?php
require 'config.php';

    if(isset($_POST['crudSubmit'])){

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
        <input type="submit" value="Salvar" name="crudSubmit">
    </p>
</form>
