<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
  // Step 7: If the user is not logged in, redirect to the login page
  header('location: /');
  exit;
  
}

// Restricted content goes here

?>
