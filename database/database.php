<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tree_management";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
// echo "Connected successfully";
?>