<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentification</title>
    <link rel="stylesheet" href="mymarket.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
    body{
        background-image: url("./images-mymarket/admi1.jpg");
        background-repeat: no-repeat;
        background-size:cover;
    }
   
    </style>
    <style>
body {
    font-family: 'Poppins';font-size: 15px;
}
</style>
</head>
<body style="display: flex;flex-direction:column;  justify-content:center;align-items: center;justify-items:center;">
    <div class="img_admin">
        <img  class="img_img" src="./images-mymarket/admin-removebg-preview.png" alt="">
    </div>
    <div class="admin_self">
        <img src="./images-mymarket/auto-removebg-preview.png" alt="">
        <form action="adminconexion.php"method="post" style="display: flex;flex-direction: column;">
            <input class="admin_input" type="text" name="user_name" id="" placeholder="User name">
            <input class="admin_input" type="password" name="password" id="" placeholder="Password" aria-controls="auto">
            <input class="admin_submit" type="submit" name="submit" value="Se connecter">
            <div id="div_remarque">
                <p class="remarque" id="remarque">nom ou d utilisateur ou mot de passe incorrect</p>
                <img id="img_remarque" src="./images-mymarket/exclamation-removebg-preview.png" alt="">
            </div>
        </form>
    </div>
</body>
</html>
<?php
        if(isset($_POST["submit"])){
            $nom=$_POST["user_name"];
            $password=$_POST["password"];
            if($nom =="admin" && $password=="1234" ){
                header("location:admin.php");
            }
            else{
                echo "<script>
            const remarque=document.querySelector('#div_remarque');
            remarque.style.display='block';
        </script>";
            }
        }
?>