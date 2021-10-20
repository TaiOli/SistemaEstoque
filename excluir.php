<!-- Chamando configuração de conexão com o banco-->
<?php
require 'config.php';

//Deletando um item da tabela
$id=$_GET['id'];
$sqldel=$pdo->prepare("DELETE FROM produto WHERE id= $id");
$sqldel->execute();
header('Location:sistemaEstoque.php');

?>