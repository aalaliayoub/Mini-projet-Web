<?php
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
$id=$_POST['id'];
$marq=$_POST["marque"];
$description=$_POST["description"];
$price=$_POST["prix"];
$price2=$_POST["prix_encienne"];
$src=$_POST["src"];
$categorie=$_POST["type"];
$date=$_POST["date"];
$nb=$_POST["nb_etoile"];
$up=$database->prepare("UPDATE produuit set marque=?,description=?,prix=?,prix_encienne=?,src=?,date_depot=?,type=?,nb_etoile_plien=? where id=?");
$up->execute(array($marq,$description,$price,$price2,$src,$date,$categorie,$nb));
header("location:admin.php");
?>

