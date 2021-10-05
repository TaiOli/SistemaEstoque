<?php
require 'config.php';

$descricao= filter_input(INPUT_POST,'descricao');
$quantidade= filter_input(INPUT_POST,'quantidade');


//Adição dos dados e validação
if($descricao){

    $sql=$pdo->prepare("SELECT *FROM produto WHERE descricao=:descricao");
    $sql->bindValue(':descricao',$descricao);
    $sql->execute();

    if($sql->rowCount()===0){

        $sql= $pdo->prepare("INSERT INTO produto(descricao,quantidade) VALUES (:descricao, :quantidade)");
        $sql ->bindValue(':descricao',$descricao);
        $sql ->bindValue(':quantidade',$quantidade);
        $sql->execute();

        header("Location:caminhobd.php");
        exit;
    }else{
        header("Location:insertProdutos.php");
    }
}else{
    header("Location:insertProdutos.php");
    exit;
}



