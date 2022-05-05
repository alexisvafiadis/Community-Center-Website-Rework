<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<form method="post" action="register.php" name="registerform">


    <!-- the email input field uses a HTML5 email type check -->
    <div class="form-element">
    <label for="login_input_email">Email</label>
    <input id="login_input_email" class="login_input" type="email" name="email" required />
    </div>

    <div class="form-element">
    <label for="login_input_username">First Name</label>
    <input id="login_input_username" class="login_input" type="text" pattern="^[A-Za-z]+(\s[A-Za-z]+){0,2}$" name="firstname" required />
    </div>

    <div class="form-element">
    <label for="login_input_username">Last Name</label>
    <input id="login_input_username" class="login_input" type="text" pattern="^[A-Za-z]+(\s[A-Za-z]+){0,2}$" name="lastname" required />
    </div>

    <div class="form-element">
    <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="password_new" pattern=".{6,}" required autocomplete="off" />
    </div>

    <div class="form-element">
    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="password_repeat" pattern=".{6,}" required autocomplete="off" />
    <input type="submit"  name="register" value="Register" />
    </div>

</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>
