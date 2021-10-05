<?php

require 'config.php';

$descricao= filter_input(INPUT_POST,'descricao');
$quantidade= filter_input(INPUT_POST,'quantidade');
$id= filter_input(INPUT_POST,'id');

//Editando os dados
$sql=$pdo->prepare('UPDATE produto SET descricao=:descricao, quantidade=:quantidade WHERE id=:id');
$sql ->bindValue(':descricao',$descricao);
$sql ->bindValue(':quantidade',$quantidade);
$sql ->bindValue(':id',$id);
$sql->execute();
$id = $pdo->lastInsertId();


    if($sql!=0){
        echo 'Alterado com sucesso!';
        header("Location:editProduto.php");
    }else{
        echo 'Erro ao alterar os dados!';
        header("Location:editProduto.php");
    }
?>