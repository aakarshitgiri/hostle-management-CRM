<?php 

require '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('PHPMailer/Exception.php');
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');


if(isset($_POST['submit'])){
    $mail = new PHPMailer(true);
    $messege = $_POST['messege'];
    $subject = $_POST['subject'];
    try {
        //Server settings
      
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hostelroyalboys@gmail.com';                     //SMTP username
        $mail->Password   = 'RISHU@749';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('aakarshitgiri1998@gmail.com', 'Royal Boys Hostel');
        foreach ($_POST['checkbox'] as $email) {
            $mail->addAddress($email);     //Add a recipient
        
        }
     


       
      
    
      
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $messege;
    
    
        $mail->send();
      
        echo '<script type="text/javascript">'; 
        echo 'alert("Message has been sent successfully");'; 
        echo 'window.location.href = "../notification.php";';
        echo '</script>';
    } catch (Exception $e) {
        echo '<script type="text/javascript">'; 
        echo "alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')"; 
        echo 'window.location.href = "../notification.php";';
        echo '</script>';
    }



}







?>