<?php

include_once "../../database/database.php";

// Retrieve form data
$tree_name = mysqli_real_escape_string($db, $_POST['tree_name']);
$price = mysqli_real_escape_string($db, $_POST['price']);
$contact_email = mysqli_real_escape_string($db, $_POST['contact_email']);
$stock = mysqli_real_escape_string($db, $_POST['stock']);
$location = mysqli_real_escape_string($db, $_POST['location']);
$user_id = mysqli_real_escape_string($db, $_POST['user_id']);

// Check if image file is a real image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
  $image = $_FILES['image']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));
} else {
  echo "File is not an image.";
}

// Generate a unique file name for the image
$file_name = uniqid().".jpg";

// Set the upload directory
$upload_dir = "../../assets/images/" . $file_name;
$image_location =  "/assets/images/" . $file_name;

// Move the uploaded image to the specified directory
move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir);

// Construct the INSERT query
$query = "INSERT INTO trees (tree_name, price, image, contact_email, stock,location,user_id) VALUES ('$tree_name', '$price', '$image_location', '$contact_email', '$stock', '$location', '$user_id')";

// Execute the query
if (mysqli_query($db, $query)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($db);
}

mysqli_close($db);


?>