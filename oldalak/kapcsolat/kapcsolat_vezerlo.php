<?php 

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

$alert = '';

if(isset($_POST['btnSubmit'])){
  $fname = $_POST['txtKerNev'];
  $lname = $_POST['txtVezNev'];
  $email = $_POST['txtEmail'];
  $message = $_POST['txtMsg'];

  try{
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'touristguide.mesterremek@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Boronkay01'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('touristguide.mesterremek@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('balint.portella@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Üzenet érkezet (Kapcsolat oldal)';
    $mail->Body = "<h3>Név : $lname $fname <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Üzenet elküldve! Köszönjük visszajelzését!</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}

?>