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
    <title>Tree Management System</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <div class="nav_search">
                    <form action="/dashboard/search/search.php" method="get">
                        <div class="search_field">
                            <input type="text" name="search" class="search_input" placeholder="Search post..">
                            <i class="fa-solid fa-magnifying-glass search_icon"></i>
                        </div>
                    </form>
                </div>
                <a href="/dashboard/cart">Cart </a>
                <a href="/dashboard/profile/"> Profile</a>
                <a href="/signout"> Signout</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="main">
            <?php
            $query = "SELECT * FROM trees";
            if(!empty($_GET['search'])){
                $search = $_GET['search'];
                $query = "SELECT * FROM trees WHERE tree_name LIKE '%$search%'";

            }
            $result = mysqli_query($db, $query);
            $trees = mysqli_fetch_all($result);

            foreach ($trees as $tree) {
                $updatelink = '/dashboard/updatepost/?id=' . $tree['0'];
                $detailLink = '/dashboard/post/details.php?tree_id=' . $tree['0'];
                if ($tree['7'] != $_SESSION['user_id']) {
                    $updatelink = '#';
                }

                echo "
                        <div class='card'>
                        <div class='img'>
                            <img src='" . $tree['3'] . "' alt='tree' srcset='' />

                            <p class='tree_count'>Name: " . $tree['1'] . "tk</p>
                            <p class='tree_count'>Price: " . $tree['2'] . "tk</p>
                            <a class='tree_count'>Stock: " . $tree['5'] . "</a>

                        </div>
                        <div class='footer'>
                            
                            <a href='" . $updatelink . "' class='footer_btn update' >Update</a>
                            <a href='" . $detailLink . "' class='footer_btn'>Details</a>
                        </div>
                        </div>
                    
                    ";
            }
            ?>
        </section>
        <section class="sidebar">
            <div>
                <div class="mb-2"><a href="/dashboard/createpost/" class="btn">Create Post</a></div>
                <div><a class="btn" href="#" onclick="deletePost('/dashboard/delete/delete.php')">Delete Post</a></div>
            </div>
        </section>
    </main>

    <script>
        const updateButtons = document.querySelectorAll('.update');
        updateButtons.forEach((button) => {
            button.addEventListener('click', (e) => {
                if (e.target.href === 'http://localhost/dashboard/#') {
                    alert("you are unauthorized to updated the post");
                }
            })
        });

        const deletePost = (link) => {
            if (confirm("Are you sure you want to delete all of your post? ")) {
                window.location = link;
            }
        }
    </script>
</body>

</html>