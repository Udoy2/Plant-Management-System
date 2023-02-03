<?php
    include_once "../../database/database.php";
    session_start();

    $search = mysqli_real_escape_string($db, $_GET['search']);
    if(!empty($search)){
        header('location: /dashboard?search=' . $search);
    }
    else{
        header('location: /dashboard');
    }

?>