<?php
require 'config.php';

$id=$_GET['id'];
$sqldel=$pdo->prepare("DELETE FROM produto WHERE id= $id");
$sqldel->execute();
header('Location:sistemaEstoque.php');

?>