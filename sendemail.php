<?php
use PHPMailer\PHPMailer\PHPMailer; 

if (isset($_POST['name']) && isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $txtarea = $_POST['txtarea'];

  require_once 'PHPMailer\PHPMailer.php';
  require_once 'PHPMailer\SMTP.php';
  require_once 'PHPMailer\Exception.php';

  $mail = new PHPMailer();

  $mail->isSMTP();   
  $mail->Host       = 'smtp.gmail.com';  
  $mail->SMTPAuth   = true;      
  $mail->Username   = 'mail@gamil.com';  
  $mail->Password   = 'secret';  
  $mail->Port       = 465;
  $mail->SMTPSecure = 'ssl'; 

  $mail->isHTML(true);  
  $mail->setFrom($email, $name);
  $mail->addAddress("mail@gamil.com");
  $mail->Body       = $txtarea;

  if ($mail->send()) {
    $status = "success";
    $response = "Email is sent!";
  }
  else {
    $status = "failed";
    $response = "Something went wrong: <br>" . $mail->ErrorInfo;
  }

  exit(json_encode(array("status" => $status, "response" => $response)));

}
?>