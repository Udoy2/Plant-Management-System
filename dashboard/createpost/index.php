<?php
include_once "../../middleware/auth.php";
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
            <form action="createpost.php" method="post" enctype="multipart/form-data">
                <input type="text" id="tree_name" name="tree_name" placeholder="Tree name"><br>
                <input type="text" id="price" name="price" placeholder="Price"><br>
                <input type="text" id="contact_email" name="contact_email" placeholder="Contact Email"><br>
                <input type="text" id="stock" name="stock" placeholder="Stock"><br><br>
                <input type="text" id="location" name="location" placeholder="Location"><br><br>
                <input type="file" id="image" name="image"><br>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
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