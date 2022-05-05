<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include('config.php');
if (isset($_POST["sendletter"])) {
    $target_dir = "newsletters/";
    $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    if ($_FILES["userfile"]["size"] > 600000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    if($imageFileType != "pdf" ) {
      echo "Sorry, please import the letter as a PDF instead!";
      $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
      echo "The sending didn't work, sorry.";
    } else {
      if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["userfile"]["name"])). " has been uploaded.";
        $subject = $_POST["subject"];
        $body = $_POST["body"];
        $file = $target_file;
        $result = mysqli_query($conn, "SELECT * FROM user");
        while ($row = mysqli_fetch_object($result))
        {
        if ($row->subscribed == 1) {
        $mail = new PHPMailer(true);
        
        try { 
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'alexisvafiadis@gmail.com';                     //SMTP username
            $mail->Password   = 'monmdp';                               //SMTP password
            $mail->SMTPSecure = 'tls';          //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('alexisvafiadis@gmail.com', 'Alexis');
            $mail->addAddress($row->email);               //Name is optional
        
            //Attachments
            $mail->addAttachment($file);         //Add attachments
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = 'Hello '. $row->firstname . ' ' . $row->lastname . '! ' . $body . '<br>Y Saith Seren<br>Canolfan Gymraeg Wrecsam<br>18 Stryd Caer<br>Wrecsam<br>LL13 8BG<br>01978 447006<br>Log on <a href="http://www.saithseren.org.uk/">our website</a> if you wish to unsubscribe!';
            $mail->AltBody = 'Hello '. $row->firstname . ' ' . $row->lastname . '! ' . $body . '
Y Saith Seren
Canolfan Gymraeg Wrecsam
18 Stryd Caer
Wrecsam
LL13 8BG
01978 447006
Log on http://www.saithseren.org.uk/ if you wish to unsubscribe!';
        
            $mail->send();
            echo '<p>Message has been sent</p>';
        } catch (Exception $e) {
            echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
        }
        }
        }
        redirect("panel.php");
      } else {
        echo "Sorry, there was an error uploading the newsletter.";
      }
    }
}
?>

<html>
<form enctype="multipart/form-data" method="post" action="" name="sendletter-form">
<div class="form-element">
    <label for="subject">Mail subject</label>
    <input type="text" id="subject" name="subject" value="Saith Seren Newsletter" required />
</div>
<div class="form-element">
    <textarea rows = "15" cols = "120" name = "body" id="body", required>Here is your monthly newsletter. We hope to see you in our pub soon!</textarea>
</div>
<div class="form-element">
  
  </div>
<div class="form-element">
    <label for="file">Import the newsletter</label>
    <input type="file" id="file" name="userfile" required />
</div>
<button type="submit" name="sendletter" value="sendletter">Send newsletter</button>
</form>
</html>
