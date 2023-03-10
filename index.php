<?php

session_start();
if (isset($_SESSION['logged_in'])) {
  header('location: /dashboard');
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tree management system</title>
  <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
  <div class="container">
    <div class="form">
      <h2>Login To Your Account</h2>
      <form method="post" action="./login/login.php">
        <input type="text" name="email" placeholder="Email.." />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" name="login" value="Log In" class="button" />

        <a href="/signup" class="text_small">Signup</a>
      </form>
      <?php
        include_once "./middleware/errorViewer.php";
        errorViewer();
      ?>
    </div>
  </div>
</body>

</html>