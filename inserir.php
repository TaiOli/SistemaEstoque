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
    <label>
        Descricao: <input type="text" name="descricao"/>
    </label>
    <label>
        Quantidade: <input type="number" name="quantidade"/>
    </label>
    <input type="submit"  value="Salvar" name="crudSubmit"/>
</form>
