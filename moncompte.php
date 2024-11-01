<?php
session_start();
$id_client=session_id();
$database=new PDO("mysql:host=localhost;dbname=mymarket","root","");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="mymarket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
body {
    font-family: 'Poppins';font-size:15px;
}
</style>
</head>
<body style="padding:20px 30px 0px 30px ;">
    <div style="display: flex;flex-direction:row;justify-content:space-between">
       <div style="display: flex;">
            <div>
                <a href="mymarket.php"><img class="image" src="./images-mymarket/mymarket.ma-_2_195x@2x.avif" alt=""></a>
            </div>
            <div class="commande">
                <a href="moncompte.php?element=commander"><p class="element">Commander</p></a>
            </div>
       </div>
       <div class="profil">
            <div>
                <label style="display: flex;flex-direction:row">
                <input type="checkbox" id="checkbox_face" style="display:none;">
                    <div class="div_face">
                        <div class="face"></div>
                        <div class="corps"></div>
                    </div>
                    <div>
                        <svg class='svgsvg' aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="svg-inline--fa fa-caret-down ml-2 transition-transform" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M310.6 246.6l-127.1 128C176.4 380.9 168.2 384 160 384s-16.38-3.125-22.63-9.375l-127.1-128C.2244 237.5-2.516 223.7 2.438 211.8S19.07 192 32 192h255.1c12.94 0 24.62 7.781 29.58 19.75S319.8 237.5 310.6 246.6z"></path></svg>
                    </div>
                </label>
            </div>
            <div class="div_botique">
                <a class="botique" href="mymarket.php">acceder a la botique</a>
            </div>
       </div>
    </div>
    <div class='cour' id='howa'>
        <h1 style='color:black'>Commandes</h1>
        <div class='div_content'>
            <div class='content'>
                <h3>Aucune commande pour l'instant</h3>
                <p>Accédez à la boutique pour passer une commande.</p>
            </div>
        </div>
    </div>
    <?php
    $selection=$database->prepare("select email from client where id=?");
    $selection->execute(array(session_id()));
    $resulat=$selection->fetchAll();
    $email=$resulat[0]["email"];
    if(isset($_GET["element"])){
        echo "<script>
        const cour=document.querySelector('.cour')
        cour.style.display='none';
        </script>";
        $element=$_GET["element"];
        if($element==='profil'){
            echo "<div class='cour'>
        <h1 style='color:black'>Profil</h1>
        <div class='mod'>
            <div class='mod1'>
                <p>Nom</p>
                <img class='modifier' src='./images-mymarket/modifier-removebg-preview.png' alt=''>
            </div>
            <p style='margin-top:0px'>".$_SESSION['nom']."</p>
            <div>
                <p>E-mail</p>
                <p style='margin-top:0px'>$email</p>
            </div>
        </div>
        <div class='div_contentt'>
            <div class='contentt'>
                <div class='contentt1' ><p>Address</p>
                <button type='button'>+Ajouter</button></div>
               <div class='adress'>
                    <div class='cercle1'>
                        <div class='point'></div>
                        <div class='tig'></div>
                    </div>
                    <p>Aucune adresse ajoutée</p>
                </div>
            </div>
        </div>
    </div>";
        }
        if($element==='parametre'){
            echo "<div class='cour'>
            <h1 style='color:black'>Parametre</h1>
           <div class='cour1'>
           <div class='content_parametre'>
           <div class='deconniction'>
               <img class='modifier'style='margin-left:0;' src='./images-mymarket/l9fl-removebg-preview.png' >
               <p>Se déconnecter partout</p>
           </div>
           <p>Si vous avez perdu un appareil ou si vous avez des problèmes de sécurité, déconnectez-vous partout pour assurer la sécurité de votre compte.</p>
       </div>
       <div style='width:50%'>
           <form action='desconnection.php' method='post' class='parametre_form'>
               <input type='submit' name='submit' value='Se deconnercter partout'>
               <p>Vous serez déconnecté(e) sur cet appareil aussi.</p>
           </form>
       </div>
           </div>
            </div>";
        }
        if($element=='commander'){
            echo "<div class='cour' id='howa'>
            <h1 style='color:black'>Commandes</h1>
            <div class='div_content'>
                <div class='content'>
                    <h3>Aucune commande pour l'instant</h3>
                    <p>Accédez à la boutique pour passer une commande.</p>
                </div>
            </div>
        </div>";

        }
        if($element=='Se deconnecter'){
            header("location:desconnection.php");
        }
    }
    ?>
    <hr style="margin-top: 1px;">
    <div class="politique">
        <div><a > Politique de remboursement</a></div>
        <div><a href="">Politique d'expédition</a></div>
        <div><a href="">Conditions de service</a></div>
        <div>
            <a href="">Nous contacter</a>
        </div>
    </div>
    <div class="compte">
        <div style="display: flex;">
            <div class="div_face">
                <div class="face"></div>
                <div class="corps"></div>
            </div>
            <p style="margin-left: 20px;"><?=$email?></p>
        </div>
        <hr>
       <a href="moncompte.php?element=profil"> <p class="element">Profil</p></a>
        <a href="moncompte.php?element=parametre"><p class="element">Parametre</p></a>
        <a href="moncompte.php?element=Se deconnecter"><p class="element">Se deconnecter</p></a>
    </div>
    
    <div class="totalite">
    <div class="affiche_politique">
        <div style="display: flex;flex-direction:row;justify-content:space-between;">
            <h1 style="color:black;">Politique de remboursement</h1>
            <img class="crroix" src="./images-mymarket/croix1.png" alt="">
        </div>
        <div class="container_politique">
            <p style="margin:0 5px 0 5px;">
                ndi/Mardi/Mercredi/Jeudi/Vendredi/Samedi	J+1
                Tamait	Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi	J+1
                Temsia	Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi	J+1
                Tikiouine	Lundi/Mardi/Mercredi/Jeudi/Vendredi/Samedi	J+1
                Ait amira	Lundi/Mercredi/Vendredi	J+1
                Ait boutayeb	Lundi/Mercredi/Vendredi	J+1
                Belfaa	Lundi/Mardi/Mercredi/Jeudi/Vendredi	J+1
                Biougra	Lundi/Mercredi/Vendredi/Samedi	J+1
                Houara	Lundi/Mercredi/Vendredi/Samedi	J+1
            </p>
        </div>
        <div style="height: 10px;"></div>
    </div>
    </div>
    <script src="compte.js"></script>
</body>
</html>