<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM user WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO user (email,password,firstname,lastname) VALUES (:email,:password_hash,:firstname,:lastname)");
            $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
            $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Sorry, something went wrong.</p>';
            }
        }
    }
?>

<html>
<link rel="stylesheet" href="style.css">
<form method="post" action="" name="signup-form">
<div class="form-element">
<label>Email</label>
<input type="email" name="email" required />
</div>
<div class="form-element">
<label>First Name</label>
<input type="text" name="firstname" pattern="[a-zA-Z0-9]+" required />
</div>
<div class="form-element">
<label>Last Name</label>
<input type="text" name="lastname" pattern="[a-zA-Z0-9]+" required />
</div>
<div class="form-element">
<label>Password</label>
<input type="password" name="password" required />
</div>
<button type="submit" name="register" value="register">Register</button>
</form>
</html>