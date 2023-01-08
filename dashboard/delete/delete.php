<?php

include_once "../../database/database.php";
session_start();
$query = "DELETE  FROM trees WHERE user_id=".$_SESSION['user_id'];
if (mysqli_query($db, $query)) {
    header('location: /dashboard');
} else {
    echo "ERROR: Could not able to execute $query. "
        . mysqli_error($db);
}


?>