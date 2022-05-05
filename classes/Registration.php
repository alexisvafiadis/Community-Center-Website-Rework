<?php

/**
 * Class registration
 * handles the user registration
 */
class Registration
{
    /**
     * @var object $conn The database connection
     */
    private $conn = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
        if (empty($_POST['password_new']) || empty($_POST['password_repeat'])) {
            $this->errors[] = "Empty Password";
        } elseif ($_POST['password_new'] !== $_POST['password_repeat']) {
            $this->errors[] = "Password and password repeat are not the same";
        } elseif (strlen($_POST['password_new']) < 6) {
            $this->errors[] = "Password has a minimum length of 6 characters";
        }  elseif (empty($_POST['email'])) {
            $this->errors[] = "Email cannot be empty";
        } elseif (empty($_POST['firstname'])) {
            $this->errors[] = "First Name cannot be empty";
        } elseif (empty($_POST['lastname'])) {
            $this->errors[] = "Last Name cannot be empty";
        } elseif (strlen($_POST['email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
        } elseif (!empty($_POST['email'])
            && strlen($_POST['email']) <= 64
            && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['password_new'])
            && !empty($_POST['password_repeat'])
            && ($_POST['password_new'] === $_POST['password_repeat'])
        ) {
            // create a database connection
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // if no connection errors (= working database connection)
            if (!$this->conn->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $email = $this->conn->real_escape_string(strip_tags($_POST['email'], ENT_QUOTES));
                $firstname = $this->conn->real_escape_string(strip_tags($_POST['firstname'], ENT_QUOTES));
                $lastname = $this->conn->real_escape_string(strip_tags($_POST['lastname'], ENT_QUOTES));
                $password = $_POST['password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM user WHERE email = '" . $email . "';";
                $query_check_email = $this->conn->query($sql);

                if ($query_check_email->num_rows == 1) {
                    $this->errors[] = "Sorry, that email address is already taken.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO user (email, password, firstname, lastname)
                            VALUES('" . $email . "', '" . $password_hash . "', '" . $firstname . "', '" . $lastname . "');";
                    $query_new_user_insert = $this->conn->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = "Your account has been created successfully. You can now log in.";
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
    }
}
