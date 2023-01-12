<?php
include_once "../../middleware/auth.php";
include_once "../../database/database.php";
$query = "SELECT * FROM carts WHERE user_id=" . $_SESSION['user_id'];
$result = mysqli_query($db, $query);
$carts = array();
while ($row = mysqli_fetch_assoc($result)) {
    $query1 = "SELECT * FROM trees WHERE id=" . $row['tree_id'];
    $result2 = mysqli_query($db, $query1);
    $carts[] = mysqli_fetch_assoc($result2);
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
                <a href="/dashboard/cart">Cart </a>
                <a href="/dashboard/profile/"> Profile</a>
                <a href="/signout"> Signout</a>
            </div>
        </div>
    </nav>
    <main>
        <section class="cart">
            <?php
            if (!empty($carts)) {

                foreach ($carts as $cart) {

                    echo "
                    <div class='cart_card'>
                    <img src='" . $cart['image'] . "' alt='' class='cart_img' />
                    <div class='content'>
                    <h1>" . $cart['tree_name'] . "</h1>
                        <p>Price: <span>" . $cart['price'] . "tk</span></p>
                    </div>
                </div>
                
                
                ";
                }
                echo "
                            <div class='cart_delete'>
                                <a href='#' id='delete_cart'>Delete</a>
                            </div>  
            ";
            } else {
                echo "
                <h1 style='text-align:center;'>Cart is empty</h1>
                
            ";
            }
            ?>




        </section>
    </main>

    <script>
        const delete_cart_button = document.getElementById('delete_cart');
        const deleteCart = () => {
            if (confirm("Are you sure you want to empty cart? ")) {
                window.location = ' /dashboard/cart/delete.php';
            }
        }
        delete_cart_button.addEventListener('click',deleteCart);
    </script>
</body>

</html>