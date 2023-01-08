<?php
include_once "../../middleware/auth.php";
include_once "../../database/database.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM trees WHERE id=" . $id;
    $result = mysqli_query($db, $query);
    $tree = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree management system</title>
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css" />

</head>

<body>
    <nav>
        <div class="nav_container">
            <div class="nav_brand">
                <a class="brand_link" href="/dashboard">
                    <h2>Tree Management</h2>
                </a>
            </div>
            <div class="nav_item">
                <a href="#">Cart </a>
                <a href="#"> Profile</a>
                <a href="/signout"> Signout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="form">
            <h2>Create a new post</h2>
            <form action="updatepost.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="text" id="tree_name" name="tree_name" placeholder="Enter tree name" value="<?php echo $tree['tree_name']; ?>"><br>
                <input type="text" id="price" name="price" placeholder="Enter price" value="<?php echo $tree['price'];; ?>"><br>
                <input type="text" id="contact_email" name="contact_email" placeholder="Enter contact contact email" value="<?php echo $tree['contact_email'];; ?>"><br>
                <input type="text" id="stock" name="stock" placeholder="Enter stock" value="<?php echo $tree['stock']; ?>"><br>
                <input type="text" id="location" name="location" placeholder="Enter location" value="<?php echo $tree['location']; ?>"><br>
                <input type="file" id="image" name="image" placeholder="Select image"><br>
                <input type="submit" value="Submit" class="button">


            </form>
            <?php
            include_once "../../middleware/errorViewer.php";
            errorViewer();
            ?>
        </div>
    </div>
</body>

</html>