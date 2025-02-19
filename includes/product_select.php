<?php ob_start(); ?>

<?php session_start(); ?>
<?php include "../includes/db.php"; ?>

<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../css/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/css/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        [popover]::backdrop {
            backdrop-filter: blur(2.5px);
        }
    </style>
</head>

<body>
    <?php include "../includes/navigaton.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card h-100">
                    <?php
                    if (isset($_GET['p_id'])) {
                        $product_id = $_GET['p_id'];



                        $query = "SELECT * FROM products WHERE product_id = {$product_id}";
                        $result = mysqli_query($connection, $query);

                        if ($row = mysqli_fetch_assoc($result)) {
                            $product_name = $row['product_name'];
                            $product_image = $row['product_image'];
                            $product_description = $row['product_description'];
                            $product_price = $row['product_price'];
                            $product_quantity = $row['product_quantity'];
                        }
                    ?>

<?php
if (isset($_POST['addcart'])) {
    $user_id = $_POST['user_cart_id'];
    $product_id = $_POST['product_cart_id'];
    $cart_name = $_POST['cart_name'];
    $cart_image = $_POST['cart_image'];
    $cart_price = $_POST['cart_price'];
    $cart_quantity = $_POST['cart_quantity'];

    // Check if product is already in the cart
    $check_query = "SELECT * FROM carts WHERE user_cart_id = '{$user_id}' AND product_cart_id = '{$product_id}'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $successMsg = "<h6 class='text-bold text-danger text-center'>Product already added to cart!</h6>";
    } else {
        $query = "INSERT INTO carts (user_cart_id, cart_name, product_cart_id, cart_image, cart_price, cart_quantity) ";
        $query .= "VALUES ('{$user_id}', '{$cart_name}', '{$product_id}', '{$cart_image}', '{$cart_price}', '{$cart_quantity}')";
        $inset_cart_query = mysqli_query($connection, $query);

        if (!$inset_cart_query) {
            die("QUERY FAILED: " . mysqli_error($connection));
        } else {
            $successMsg = "<h6 class='text-bold text-success text-center'>Product added to cart successfully!</h6>";
        }
    }
}
?>

                        <form action="" method="POST">
                            <div class="text-center font-weight-bold pt-3">
                                <div class="clearfix mx-4">
                                    <h6 class="float-left my-2" name="user_product_name"><?php echo $product_name; ?></h6>
                                    <a href="../user/cart.php" class="float-right btn btn-outline-success btn-sm">
                                        <?php
                                        $query = "SELECT * FROM carts WHERE user_cart_id = {$user_id}";
                                        $select_user_carts_query = mysqli_query($connection, $query);
                                        $carts_count = mysqli_num_rows($select_user_carts_query);

                                        echo "<i class='mdi mdi-cart-outline'>Carts <span class='badge badge-danger'>{$carts_count}</span> </i>";

                                        ?>
                                    </a>
                                </div>
                                <h4>
                                    <?php
                                        if(isset($successMsg)){
                                            echo $successMsg;
                                        }
                                    ?>
                                
                                </h4>
                                <h6><b class="text-danger">Price</b> $<?php echo $product_price; ?></h6>
                            </div>
                            <img src="../images/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>" class="img-fluid mx-auto" width="100">
                            <div class="card-body">
                                <p><?php echo $product_description; ?></p>
                                <label for="quantity">Quntity:</label>
                                <div class="input-group">
                                <button type="button" class="btn btn-secondary" onclick="decrementQuantity()">-</button>
                                <input type="number" name="cart_quantity" value="1" min="1" max="<?php echo $product_quantity; ?>" id="quantity" class="form-control">
                                    <button type="button" class="btn btn-secondary" onclick="incrementQuantity()">+</button>
                                    
                                </div>
                                <div class="clearfix mt-2">
                                    <div class="float-left">
                                        <a href="../index_access.php" class="btn text-dark btn-outline-warning btn-sm">
                                            <span class="mdi mdi-home-outline mdi-20px">Shopping</span>
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <!-- <input type="hidden" name="user_product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                        <input type="hidden" name="user_product_name" value="<?php echo htmlspecialchars($product_name); ?>">
                                        <input type="hidden" name="user_product_image" value="<?php echo htmlspecialchars($product_image); ?>">
                                        <input type="hidden" name="user_product_price" value="<?php echo htmlspecialchars($product_price); ?>"> -->
                                        <input type="hidden" name="product_cart_id" value="<?php echo $product_id; ?>">
                                        <input type="hidden" name="user_cart_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="cart_name" value="<?php echo $product_name; ?>">
                                        <input type="hidden" name="cart_image" value="<?php echo $product_image; ?>">
                                        <input type="hidden" name="cart_price" value="<?php echo $product_price; ?>">
                                        <input type="submit" name="addcart" value="Add to Cart" class="btn btn-outline-success btn-sm">
                                    </div>
                                </div>
                        </form>
                </div>
            <?php
                    }
            ?>
            </div>
        </div>
    </div>
    </div>




    <div class="footer bg-warning"></div>
    <script src="../css/js/jquery-3.4.1.min.js"></script>
    <script src="../css/js/popper.min.js"></script>
    <script src="../css/js/bootstrap.min.js"></script>

    <script>
        function incrementQuantity() {
            var quantityInput = document.getElementById("quantity");
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decrementQuantity() {
            var quantityInput = document.getElementById("quantity");
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
</body>

</html>