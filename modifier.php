<?php
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
if(isset($_POST["submit_supprimer"])){
    $delet=$database->prepare("DELETE FROM produuit where id=?");
    $delet->execute(array($_POST["id"]));
    header("location:admin.php");
}
 $id=$_POST['id'];
 $marq=$_POST["marque"];
 $selet=$database->prepare("select description from produuit where id=?");
 $selet->execute(array($id));
 $resultat=$selet->fetchAll();
 $price=$_POST["prix"];
 $src=$_POST["src"];
 $categorie=$_POST["type"];
 $date=$_POST["date"];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mymarket.css">
    <style>
        .inputs{
            width:100%;
            display:grid;
            grid-template-columns:1fr 3fr;
            
            align-items: center;
        }
        .admin_form{
            margin-top: -40px;
            width: 80%;
            display:grid;
            margin-left:50px;
            padding-left:5%;
            padding-bottom: 5px;
            background-image: url("./images-mymarket/<?=$src?>");
            background-repeat: no-repeat;
            background-size:contain;
            background-position: center;
        }
        .al{
            width: 60%;
            border: 1px solid black;
            margin-left: 20%;
            margin-top: 140px;
            padding-bottom: 5px;
            height:240px;
            background-color:rgba(255, 255, 255, 0.623);
        }
        body{
            background-color: #eaeded;
            display:grid;
            justify-content: center;
            justify-items: center;
            align-content: center;
        }
        .produitt{
            background: white;
    transform: translate(80px,-27px);
    width:max-content;
   background: linear-gradient(180deg,#eaeded,white);
        }
    </style>
</head>
<body>
<div>
    <div class="al">
    <p class="produitt">Modifier produit</p>
    <form action="enregistiremodification.php" method="post" class="admin_form">
        <div class="inputs">
        <div class="diiiv">
            <input class="file" type="text" name="src" id="" style="margin-top: 15px;" value=<?=$src?>>
        </div>
            <div class="diiiv">
                <input style="margin-left:85px;" type="number" step="any" name="prix" id="" placeholder="price" value=<?=$price?>>
            </div>
            <div class="diiiv">
                <input type="number" step="any"  name="encienne_prix" id="" placeholder="Encienne Prix(optionnelle) :"value=<?=$price?>>
            </div>
            <div class="diiiv">
                <input style="margin-left:85px;" type="text" name="description" id="" placeholder="description :">
            </div>
            <div class="diiiv">
                <input type="number" name="nb_etoile" id="" placeholder="nombre des etoille :">
            </div>
            <div class="diiiv">
                <input style="margin-left:85px;" type="text" name="marque" id="" placeholder="Maqrue : "value=<?=$marq?>>
            </div>
            <div class="diiiv">
                <input style="height: 30px;width:165px" type="date" name="date" id="" placeholder="date de depot :"value=<?=$date?> >
            </div>
            <div class="diiiv">
                <input style="margin-left:85px;" type="text" name="type" id="" placeholder="categore" value=<?=$categorie?>>
            </div>
        </div>
        <div class="diiiv" style="width: 100%; margin-top:14.5%;position:absolute">
            <input class="buton_submit" style="height: 40px;width:588px;"  type="submit" value="Enregistrer Modification" name="submit">
        </div>
    </form>
    </div>
    </div>
</body>
</html>