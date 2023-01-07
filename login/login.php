<?php

include_once "../database/database.php";



if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $errors = [];


  $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['id'];
    
    header('location: /dashboard');
    
  } else {
    session_start();
    $errors[] =  "Invalid username or password";
    $_SESSION['errors'] = $errors;
    header('location: /');
    
  }
}

?>