<?php
session_start();
$time=$_SESSION["time"];
$email=$_SESSION["email"];
$code=$_SESSION["code"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verification</title>
    <link rel="stylesheet" href="mymarket.css">
</head>
<body style="display: flex; flex-direction:column;background-color: #e3e4e5be;">
<div class="connection">
            <div class="connexionn">
                    <a href="mymarket.php" target="_self"><img src="./images-mymarket/mymarket.ma-_2_195x@2x.avif" alt=""></a>
                <h1 style="margin-left: 0;">Saisir le code</h1>
                <p>Envoyée à <?=$email?></p>
                <form action="verefication.php" method="post">
                    <div class="conx-email"><input class="input-email" type="number" name="code" id="email" placeholder="code a six chiffre"></div>
                    <p class="remarque" style="color: red;"></p>
                    <div class="conx-submit"><input class="input-submit" type="submit" value="Soumettre" name="submit"></div>
                </form>
                <a href="connexion.php" style="color: #00badb;">Se connecter avec une autre adresse e-mail</a>
            </div>
        </div>
</body>
</html>
<?php
    if(isset($_POST["code"])){
        $now = new DateTime();
        $interval = $now->diff($time);
        $minutes =($interval->days * 24 * 60) +($interval->h * 60)+$interval->i; 
       if($minutes>1){
        echo"<script>
            const remarque=document.querySelector('.remarque');
            remarque.textContent='la duree de verification est echoe essaie d autre fois';
        </script>";
       }
       else{
        if($_POST["code"]==$code){
            $database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
            $insertion=$database->prepare("UPDATE client set email=?,nom=?,password=?,cas=? where id=?");
            $insertion->execute(array($_SESSION["email"],$_SESSION["nom"],md5($_SESSION['password']),1,session_id()));
            $_SESSION['connexion']=true;
            header("location:moncompte.php");
        }
        else{
            echo"<div class='erreur_div'>
                <p class='erreur'> le code sisair est incorrect</p>
            </div>";
        }
       }
    }
?>