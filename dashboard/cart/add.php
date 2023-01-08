<?php
    // Include the database connection file
    include_once "../../database/database.php";

    // Start a new session
    session_start();

    // Check if the tree_id parameter is set in the GET request
    if(isset($_GET['tree_id'])){
        // Set the tree_id and user_id variables
        $tree_id = $_GET['tree_id'];
        $user_id = $_SESSION['user_id'];

        // Get the row from the trees table with the corresponding id
        $query = "SELECT * FROM trees WHERE id='$tree_id' ";
        $result = mysqli_query($db,$query);
        $tree = mysqli_fetch_assoc($result);

        // Get the current stock of the tree
        $current_stock = intval($tree['stock']);

        // Insert a new row into the carts table for the tree and user
        $query = "INSERT INTO carts (user_id,tree_id) VALUES ('$tree_id', '$user_id' )";
        $result = mysqli_query($db, $query);

        // Calculate the new stock of the tree after it has been added to the cart
        $new_stock = $current_stock - 1;

        // Update the row in the trees table with the new stock value
        $query = "UPDATE trees SET stock='$new_stock' WHERE id = '$tree_id' ";
        $result = mysqli_query($db, $query);
    }

    header('location: /dashboard/post/details.php?tree_id='. $_GET['tree_id']);
?>