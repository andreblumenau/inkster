<?php

class Session {
    public final static function authValidateLogin() {

        session_start();
        // Check the received arguments
        if ($_POST["txtAccoundPwdUpdId"] != null && $_POST["txtAccountUserConfPassword"] != null) {
            // Succesful validation
            // Insert in session, and redirect to home page
            $_SESSION["getId"] = $_POST["txtAccoundPwdUpdId"];
            $_SESSION["getPwd"] = $_POST["txtAccountUserConfPassword"];
            header ("Location: ../inc/accountChange.php");
        } else {
            // Validation failure
            // Display an error message
            header("location: ../pages/account.php");
            exit();
        }
    }
}