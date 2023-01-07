<?php
include_once "../middleware/auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
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

    <main>
        <section class="main">
            <div class="card">
                <div class="img">
                    <img src="/assets/images/tee.jpg" alt="tree" srcset="" />

                    <p class="tree_count">Price: 120tk</p>
                    <a class="tree_count">Count: 12</a>

                </div>
                <div class="footer">
                    <a href="#" class="footer_btn">Update</a>
                    <a href="#" class="footer_btn">Details</a>
                </div>
            </div>
        </section>
        <section class="sidebar">
            <div>
                <div class="mb-2"><a href="/dashboard/createpost/" class="btn">Create Post</a></div>
                <div><a href="#" class="btn">Delete Post</a></div>
            </div>
        </section>
    </main>
</body>

</html>