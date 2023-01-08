<?php
include_once "../../middleware/auth.php";
include_once "../../database/database.php";
if (isset($_GET['tree_id'])) {
    $tree_id = $_GET['tree_id'];
    $query = "SELECT * FROM trees WHERE id= '$tree_id' ";
    $result = mysqli_query($db, $query);
    $tree = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
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
        <section class="tree_details_section">
            <div class="tree_card">
                <div class="tree_img">
                    <img src="<?php echo $tree['image']; ?>" alt="" srcset="" />
                </div>
                <div class="tree_information">
                    <h4>Tree Name: <span> <?php echo $tree['tree_name']; ?></span></h4>
                    <br />
                    <h4>Price: <span><?php echo $tree['price']; ?></span></h4>
                    <br />
                    <h4>Stock: <span><?php echo $tree['stock']; ?></span></h4>
                    <br />
                    <h4>Contact Email: <span><?php echo $tree['contact_email']; ?></span></h4>
                    <br />
                    <h4>Location: <span><?php echo $tree['location']; ?></span></h4>
                    <br />
                    <div>
                        <div class="mb-2"><a href="/dashboard/cart/add.php?tree_id=<?php echo $tree['id']; ?>" class="btn">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </section>
    </main>


</body>

</html>