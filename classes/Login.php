<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $conn = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['email'])) {
            $this->errors[] = "Email field was empty.";
        } elseif (empty($_POST['password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['email']) && !empty($_POST['password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            include("config.php");
            $this->conn = $conn;
            
            // if no connection errors (= working database connection)
            if (!$this->conn->connect_errno) {

                // escape the POST stuff
                $email = $this->conn->real_escape_string($_POST['email']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT *
                        FROM user
                        WHERE email = '" . $email . "';";
                $result_of_login_check = $this->conn->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['password'], $result_row->password)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['email'] = $result_row->email;
                        $_SESSION['firstname'] = $result_row->firstname;
                        $_SESSION['lastname'] = $result_row->lastname;
                        $_SESSION['admin'] = $result_row->admin;
                        $_SESSION['loggedin'] = 1;
                        $_SESSION['subscribed'] = $result_row->subscribed;

                    } else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    $this->errors[] = "This user does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['loggedin']) AND $_SESSION['loggedin'] == 1) {
            return true;
        }
        return false;
    }
}
