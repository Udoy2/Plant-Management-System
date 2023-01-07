<?php

function errorViewer(){
    session_start();
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo "<p style='color: red;font-weight: bold;text-align: center;margin-top: 0.5rem;'>" . $error . "</p>";
        }
        unset($_SESSION['errors']);
    }
}

?>