<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- login form box -->
<form method="post" action="index.php" name="loginform">

    <div class="form-element">
    <label for="login_input_email">Email</label>
    <input id="login_input_username" class="login_input" type="email" name="email" required />
    </div class="form-element">

    <div class="form-element">
    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="password" autocomplete="off" required />
</div class="form-element">

    <input type="submit"  name="login" value="Log in" />

</form>

<a href="register.php">Register new account</a>
