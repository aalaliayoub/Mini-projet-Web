<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';
if(isset($_POST["email"])){
    $code=rand(100000,999999);
    try{
        $email=$_POST["email"];
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bzaid3391@gmail.com';                     
        $mail->Password   = 'uvzd hvmi eytt llsi'; 
        $mail->SMTPSecure = 'TLS';           
        $mail->Port       = 587;
        $mail->setFrom('bzaid3391@gmail.com', 'mymarket.ma');
        $mail->addAddress($email);
        $mail->isHTML(true); 
        $mail->Subject = 'verefication code';
        $mail->Body    = "<p>votre code de verefication est<br><b>G-$code</b></p>";
        $mail->send();
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>