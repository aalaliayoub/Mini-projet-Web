<?php
    session_start();
    if(isset($_SESSION['connexion'])){
        header("location:moncompte.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter-mymarket.ma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mymarket.css">
</head>
<body class="body_connexion">        
    <div class="connection">
            <div class="connexionn">
                    <a href="mymarket.php" target="_self"><img src="./images-mymarket/mymarket.ma-_2_195x@2x.avif" alt=""></a>
                <h1>Se Connecter</h1>
                <p>Saisissez votre adresse e-mail et nous vous enverrons un code de connexion</p>
                <form action="send.php" method="post">
                    <div class="conx-email"><input class="input-email" type="text" name="nom" id="" placeholder="full name"></div>
                    <div class="conx-email"><input class="input-email" type="email" name="email" id="email" placeholder="Enterz votre Email"></div>
                    <p class="remarque" style="color: red;"></p>
                   <div class="conx-email"> <input class="input-email" type="password" name="password" id="" placeholder="password"></div>
                    <div class="conx-submit"><input class="input-submit" type="submit" value="Continuer" name="submit"></div>
                </form>
            </div>
        </div>
        <script>
            let Email='@';
            const email=document.querySelector("#email");
            const ramrque=document.querySelector(".remarque")
            email.addEventListener("input",(e)=>{
                 Email=e.target.value
                if(Email.length==0){
                    ramrque.textContent="ce champs est obligatoire";
                }
                else{
                    ramrque.textContent="";
                }
            })
        </script>
</body>
</html>
<?php
//     if(isset($_POST["submit"])){
//         $email=$_POST["email"];
//         $basedonne=new PDO("mysql:host=localhost;dbname=mymarket","root","");
//         $selection=$basedonne->prepare("select email from client");
//         $selection->execute();
//         $result = $selection->fetchAll(PDO::FETCH_COLUMN);
//         $insertion=$basedonne->prepare("insert into client(email) values(?)");
//         if(!in_array($email,$result)){
//             $insertion->execute(array($email));
//             $ids=$basedonne->prepare("select id from client where email=?");
//             $ids->execute(array($email));
//             $ids=$ids->fetchAll();
//             $_SESSION["client_id"]=$ids[0]["id"];
//             echo $ids[0]["id"];
//             header("location:moncompte.php");
//         }
// }
?>
