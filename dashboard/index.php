<?php
include_once "../middleware/auth.php";
include_once "../database/database.php";
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
            <?php
            $query = "SELECT * FROM trees";
            $result = mysqli_query($db, $query);
            $trees = mysqli_fetch_all($result);

            foreach ($trees as $tree) {
                $updatelink = '/dashboard/updatepost/?id=' . $tree['0'];
                $detailLink = '/dashboard/post/details.php?tree_id='.$tree['0'];
                if ($tree['7'] != $_SESSION['user_id']) {
                    $updatelink = '#';
                }

                echo "
                        <div class='card'>
                        <div class='img'>
                            <img src='" . $tree['3'] . "' alt='tree' srcset='' />

                            <p class='tree_count'>Price: " . $tree['2'] . "tk</p>
                            <a class='tree_count'>Stock: " . $tree['5'] . "</a>

                        </div>
                        <div class='footer'>
                            
                            <a href='" . $updatelink . "' class='footer_btn' id='update'>Update</a>
                            <a href='". $detailLink."' class='footer_btn'>Details</a>
                        </div>
                        </div>
                    
                    ";
            }
            ?>
        </section>
        <section class="sidebar">
            <div>
                <div class="mb-2"><a href="/dashboard/createpost/" class="btn">Create Post</a></div>
                <div><a href="/dashboard/delete/delete.php" class="btn">Delete Post</a></div>
            </div>
        </section>
    </main>

    <script>
        const update = document.getElementById('update');
        update.addEventListener('click', (e) => {
            if (e.target.href === 'http://localhost/dashboard/#'){
                alert("you are unauthorized to updated the post");
            }
        })
    </script>
</body>

</html>