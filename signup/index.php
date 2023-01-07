<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree management system</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <h2>Signup To Your Account</h2>
            <form method="post" action="./signup.php">
                <input type="text" name="name" placeholder="Name.." />
                <input type="text" name="email" placeholder="Email.." />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="signup" value="Sign Up" class="button" />

                <a href="/" class="text_small">Login</a>
            </form>
            <?php
                include_once "../middleware/errorViewer.php";
                errorViewer();
            ?>
        </div>
        
    </div>
</body>

</html>