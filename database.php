<?php

// CONGIGURACIÓN DE LA BASE DE DATOS

try{
    $con= new PDO('mysql:host=localhost;dbname=nasa', 'admin', 'abc123.');

}
catch(PDOException $e){
    echo $e->getMessage();
}




?>