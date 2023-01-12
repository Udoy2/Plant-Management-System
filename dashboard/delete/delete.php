<?php

include_once "../../database/database.php";
session_start();
$query = "SELECT image FROM trees WHERE user_id=".$_SESSION['user_id'];
$result = mysqli_query($db,$query);
$tree_images = mysqli_fetch_all($result);
$upload_dir = "../..";
foreach ($tree_images as $image) {
    $image_full_link = $upload_dir.$image['0'];
    unlink($image_full_link);
}
$query = "DELETE  FROM trees WHERE user_id=".$_SESSION['user_id'];
if (mysqli_query($db, $query)) {
    $query = "DELETE  FROM carts WHERE user_id=" . $_SESSION['user_id'];
    mysqli_query($db, $query);
    header('location: /dashboard');
} else {
    echo "ERROR: Could not able to execute $query. "
        . mysqli_error($db);
}


?>