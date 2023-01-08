<?php
include_once "../../database/database.php";

// Retrieve form data
$id = mysqli_real_escape_string($db, $_POST['id']);
$user_id = mysqli_real_escape_string($db, $_POST[ 'user_id']);
$tree_name = mysqli_real_escape_string($db, $_POST['tree_name']);
$price = mysqli_real_escape_string($db, $_POST['price']);
$contact_email = mysqli_real_escape_string($db, $_POST['contact_email']);
$stock = mysqli_real_escape_string($db, $_POST['stock']);
$location = mysqli_real_escape_string($db, $_POST['location']);

// Check if image file is a real image or fake image
if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    } else {
        echo "File is not an image.";
    }

    // Generate a unique file name for the image
    $file_name = uniqid() . ".jpg";

    // Set the upload directory
    $upload_dir = "../../assets/images/" . $file_name;
    $image_location =  "/assets/images/" . $file_name;

    // Move the uploaded image to the specified directory
    move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir);
    // deleting previous iimage..

    $query = "SELECT * FROM trees WHERE id='$id'";
    $result = mysqli_query($db, $query);
    $tree = mysqli_fetch_assoc($result);
    $upload_dir = "../..";
    
    $image_full_link = $upload_dir . $tree['image'];
    unlink($image_full_link);
   

    // Construct the UPDATE query

    $query = "UPDATE trees SET tree_name='$tree_name', price='$price', image='$image_location', contact_email='$contact_email', stock='$stock', location='$location' WHERE id='$id'";

    


} else {
    // Construct the UPDATE query

    $query = "UPDATE trees SET tree_name='$tree_name', price='$price', contact_email='$contact_email', stock='$stock', location='$location' WHERE id='$id'";

}





// Execute the query
if (mysqli_query($db, $query)) {
    header('location: /dashboard');
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>