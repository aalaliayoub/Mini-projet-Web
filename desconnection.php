<?php
session_start();
if(isset($_POST["submit"])){
    $database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
    $delete=$database->prepare("delete from ajouter_panier where client_id=?");
    $delete->execute(array(session_id()));
    $delete=$database->prepare("delete from client where id=?");
    $delete->execute(array(session_id()));
    session_destroy();
    header("location:connexion.php");
}
else{
    $database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
    $delete=$database->prepare("delete from ajouter_panier where client_id=?");
    $delete->execute(array($id_client));
    $delete=$database->prepare("delete from client where id=?");
    $delete->execute(array(session_id()));
    session_destroy();
    header("location:mymarket.php");
    
}
?>