<?php

include_once "../../database/database.php";
// Retrieve form data
$id = mysqli_real_escape_string($db, $_POST['id']);
$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// Construct the UPDATE query

if($password){

    $query = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id'";
}else{
    $query = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";

}

// Execute the query
if (mysqli_query($db, $query)) {
  echo "Record updated successfully";
    header('location: /dashboard/profile');

} else {
  echo "Error: " . $query . "<br>" . mysqli_error($db);
}

mysqli_close($db);
