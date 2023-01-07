<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    //removing session 
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
    // redirecting to login page
    header('location: /');
    exit;
}else{
    // redirecting to home page 
    header('location: /');
    exit;
}

?>