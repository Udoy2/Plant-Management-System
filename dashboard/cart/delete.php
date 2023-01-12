<?php
    include_once "../../database/database.php";
    session_start();
    $query = "DELETE FROM carts WHERE user_id=" . $_SESSION['user_id'];
    $result = mysqli_query($db, $query);
    header('location: /dashboard/cart');
?>