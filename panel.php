
<?php
include('config.php');
$tableName="user";
$columns= ['id', 'email','firstname','lastname','subscribed'];
$fetchData = fetch_data($conn, $tableName, $columns);
function fetch_data($conn, $tableName, $columns){
 if(empty($conn)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
$result = $conn->query($query);
if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($conn);
}
}
return $msg;
}
if (isset($_POST["uploadpicture"])) {
  $target_dir = "gallery/";
  $target_file = $target_dir . basename($_FILES["picture"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (file_exists($target_file)) {
    echo "Sorry, the file already exists.";
    $uploadOk = 0;
  }
  
  if ($_FILES["picture"]["size"] > 1500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png" && $imageFileType != "bmp" && $imageFileType != "webp") {
    echo "Sorry, please import the picture as a jpg, jpeg, gif, png, bmp or webp instead.";
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    echo "The upload didn't work, sorry.";
  } else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["picture"]["name"])). " has been uploaded to the gallery.";
    }
  }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
            $mail->Username   = 'com540test@gmail.com';                     //SMTP username
            $mail->Password   = 'justatest';                               //SMTP password
            $mail->SMTPSecure = 'tls';          //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('com540test@gmail.com', 'COM540');
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
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>Subscribed</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['firstname']??''; ?></td>
      <td><?php echo $data['lastname']??''; ?></td>
      <td><?php echo $data['email']??''; ?></td>
      <td><?php echo $data['subscribed']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
<div>
  <h3>Add an event</h3>
</div>

<div>
  <h3>Send a newsletter</h3>
<form enctype="multipart/form-data" method="post" action="" name="sendletter-form">
<div class="form-element">
    <label for="subject">Mail subject</label>
    <input type="text" id="subject" name="subject" value="Saith Seren Newsletter" required />
</div>
<div class="form-element">
    <textarea rows = "8" cols = "150" name = "body" id="body", required>Here is your monthly newsletter. We hope to see you in our pub soon!</textarea>
</div>
<div class="form-element">
  
  </div>
<div class="form-element">
    <label for="file">Import the newsletter</label>
    <input type="file" id="file" name="userfile" required />
</div>
<button type="submit" name="sendletter" value="sendletter">Send newsletter</button>
</form>
</div>

<div>
  <h3>Upload a picture to the gallery</h3>
<form enctype="multipart/form-data" method="post" action="" name="sendletter-form">
<div class="form-element">
  <div>
    <label for="picture">Import a picture (caption = file name)</label>
  </div>
    <input type="file" id="picture" name="picture" required />
</div>
<button type="submit" name="uploadpicture" value="uploadpicture">Upload</button>
</form>
</div>

</body>
</html>