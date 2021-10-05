<?php
require 'config.php';

    if(!isset($_GET['descricao'])){
        echo 'error';
    }else{
        $descricao=$GET['id'];
        $attendee=$crud->getAttendeeDetails($descricao);
    }


    $sql=$pdo->prepare("SELECT *FROM produto WHERE descricao");
    $sql->bindValue(':descricao',$descricao);
    $sql->execute();

