<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './zs/phpmailer/src/PHPMailer.php';
require './zs/phpmailer/src/SMTP.php';
require './zs/phpmailer/src/Exception.php';
if(isset($_POST["email"])){
    $code=rand(100000,999999);
    $_SESSION["code"]=$code;
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["password"]=$_POST["password"];
    $_SESSION["nom"]=$_POST["nom"];
    try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bzaid3391@gmail.com';                     
        $mail->Password   = 'uvzd hvmi eytt llsi'; 
        $mail->SMTPSecure = 'TLS';           
        $mail->Port       = 587;
        $mail->setFrom('bzaid3391@gmail.com', 'mymarket.ma');
        $mail->addAddress("bzaid3391@gmail.com");
        $mail->isHTML(true); 
        $mail->Subject = 'verefication code';
        $mail->Body    = "<p>votre code de verefication est<br><b>M-$code</b></p>";
        $mail->send();
        $_SESSION["time"]=new DateTime();
        header("location:verefication.php");
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>