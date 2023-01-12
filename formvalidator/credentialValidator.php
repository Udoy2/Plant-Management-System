<?php
session_start();
function validate($email, $password)
{
    $errors = [];
    $return_bool = true;
    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
        $_SESSION['errors'] = $errors;
        $return_bool = false;
    }

    // Validate the password (minimum 8 characters, at least 1 letter and 1 number)
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $errors[] = "Your password must be at least 8 characters long and contain at least 1 letter and 1 number.";
        $_SESSION['errors'] = $errors;
        $return_bool = false;
    }

    return $return_bool;
}


?>