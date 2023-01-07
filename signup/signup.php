<?php

include_once "../database/database.php";
include_once "../formvalidator/credentialValidator.php";


if (isset($_POST['signup'])) {
  // Step 2: Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (validate($email, $password)) {

    // Step 3: Check if the email already exists in the "users" table
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);


    if (mysqli_num_rows($result) == 0) {
      // Step 4: Insert the new record into the "users" table
      $query = "INSERT INTO users (name,email, password) VALUES ('$name','$email', '$password')";
      mysqli_query($db, $query);

      header('location: /');
    } else {
      // Step 6: Display an error message
      $errors[] = "Email already exists";
      $_SESSION['errors'] = $errors;
      header('location: /signup');
    }



  } else {
    header('location: /signup');
  }


}
