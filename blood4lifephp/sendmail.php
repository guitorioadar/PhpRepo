<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'connection.php';

//Load composer's autoloader
//require 'vendor/autoload.php';



$user_mail = $_POST['user_mail'];
//$user_mail = "guitorioadar@gmail.com";

//$user_pass = "";

//$six_digit_number = $_POST['six_digit_number'];


$sql = "select * from registration where email='$user_mail'";

$res = mysqli_query($con,$sql);

if(mysqli_fetch_array($res)>0){
    //echo 'Success';

    $sql_pass = mysqli_query($con,"select password from registration where email='$user_mail'");

    $res_pass = $sql_pass->fetch_assoc();

    $user_pass = $res_pass['password'];

    //echo $user_pass;



    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {




    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'wasisadman.cse@gmail.com';                 // SMTP username
    $mail->Password = '01712142450adar';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
     'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
  )
 );

    /*$sql_pass = mysqli_query($con,"select password from registration where email='$user_mail'");

    $res_pass = $sql_pass->fetch_assoc();

    $user_pass = $res_pass['password'];*/

    //Recipients
    $mail->setFrom('wasisadman.cse@gmail.com', 'Blood 4 Life');
    $mail->addAddress($user_mail);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('guitorioadar@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password';
    $mail->Body    = 'your password is *** '.$user_pass.' ***';
    $mail->AltBody = 'Use this password to login';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


}else{
    echo "This email is not registered";
}

/*$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {


   

    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'wasisadman.cse@gmail.com';                 // SMTP username
    $mail->Password = '01712142450adar';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
     'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
   )
  );

    //Recipients
    $mail->setFrom('wasisadman.cse@gmail.com', 'Mailer');
    $mail->addAddress($user_mail, 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('guitorioadar@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is the test email<b>$six_digit_number</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
 } catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 }
*/
 ?>