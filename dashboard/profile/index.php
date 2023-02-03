<?php
include_once "../../middleware/auth.php";
include_once "../../database/database.php";
$query = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
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
                <a href="/dashboard/cart">Cart </a>
                <a href="/dashboard/profile/"> Profile</a>
                <a href="/signout"> Signout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="form">
            <h2>Update Your Account</h2>
            <form method="post" action="./updateProfile.php">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="text" name="name" placeholder="Name.." value="<?php echo $user['name']; ?>" />
                <input type="text" name="email" placeholder="Email.." value="<?php echo $user['email']; ?>" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="signup" value="Update Profile" class="button" />


            </form>
            <?php
            include_once "../../middleware/errorViewer.php";
            errorViewer();
            ?>
        </div>
    </div>
</body>

</html>