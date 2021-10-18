<?php
require 'config.php';

 $descricao="";
 $quantidade="";
 
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sqlup=$pdo->prepare("SELECT * FROM produto WHERE id= :id LIMIT 1");
    $sqlup->bindParam(':id',$id,PDO::PARAM_INT);
    $sqlup->execute();
    $count=$sqlup->rowCount();

    if($count>0){
        $result=$sqlup->fetch(PDO::FETCH_ASSOC);
        $descricao=$result['descricao'];
        $quantidade=$result['quantidade'];
    }
}

if(isset($_POST['atualizar'])){

    $update = $pdo->prepare('UPDATE produto SET descricao=:descricao,quantidade=:quantidade WHERE id=:id');
    $update->bindParam('descricao',$_POST['descricao']);  
    $update->bindParam('quantidade',$_POST['quantidade']);  
    $update->bindParam('id',$_GET['id']);  
    
    if($update->execute()){
        header('Location:sistemaEstoque.php');
    }  
}
?>

<html>
<body>
<h1>Alterar Produtos</h1>
<form method="POST" action="">       
        <p>
                <label for="descricao">Descricao:</label><br>
                <input type="text" name="descricao" value="<?php echo $descricao;?>">
        </p>
        <p>
                <label for="quantidade">Quantidade:</label><br>
                <input type="number" name="quantidade" value="<?php echo $quantidade;?>">
        </p>
        <hr>
        <p>
                <input type="hidden" value="<?php echo $id;?>">
                <input type="submit" value="Atualizar" name="atualizar">
        </p>
    </form>
</body>
</html>