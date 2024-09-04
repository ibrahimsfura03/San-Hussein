<?php ob_start(); ?>
<?php include "../includes/db.php"; ?>

<?php
// if (!isset($_SESSION['user_name'])) {
//     header("Location: ../login.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css/bootstrap.css" />
    <link rel="stylesheet" href="css/css/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* *{
            border: 1px solid red;
        } */
    </style>

</head>

<body>


    <!--********************** Header **********************-->
    <div class="clearfix my-3 mx-2">
        <a href="cart.php" class="">
            <div class="float-left">
                <button class="btn btn-dark"><span class="mdi mdi-arrow-left mdi-20px"></span>Back</button>
            </div>
        </a>
        <div class="float-right">
            <?php
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];


                $query = "SELECT * FROM carts WHERE user_cart_id = {$user_id}";
                $select_cart_query = mysqli_query($connection, $query);
                $cart_count = mysqli_num_rows($select_cart_query);

                echo "<a href='./cart.php'><span class='mdi mdi-cart-outline mdi-24px text-dark'><span class='badge badge-warning'>$cart_count</span></span></a>";
            }
            ?>

            <a href="" class="mx-1"><span class="mdi mdi-bell-outline mdi-24px text-dark"><span class="badge badge-warning">8</span></span></a>
            <a href="../logout.php" class="mx-1"><span class="mdi mdi-logout mdi-24px text-dark"></span>
            </a>
        </div>
    </div>



    <?php
    if (isset($_GET['p_id'])) {
        $user_id = $_GET['p_id'];

    ?>

        <?php
        // if(isset($_SESSION['user_id'])){
        //     $user_id = $_SESSION['user_id'];

        // }
        $query = "SELECT * FROM carts WHERE user_cart_id = {$user_id}";
        $slect_cart_query = mysqli_query($connection, $query);


        ?>
        <?php
        if (isset($_POST['pay'])) {
            $order_type = $_POST['order_payment_type'];
            $order_address = $_POST['order_address'];
            $order_price = $_POST['order_total_price'];
            $order_quantity = $_POST['order_total_quantity'];
            $order_status = $_POST['order_status'];
            $order_user_name = $_POST['order_user_name'];
            $order_user_email = $_POST['order_user_email'];
            $user_id = $_POST['order_user_id'];
            $order_date = date('Y-m-d');

            if (!empty($order_type) && !empty($order_address) && !empty($order_user_email)) {

                $query = "INSERT INTO orders (order_payment_type, order_address, order_total_price, order_total_quantity, order_user_name, order_user_email, order_date, order_user_id, order_status) VALUES ('{$order_type}', '{$order_address}', '{$order_price}', '{$order_quantity}', '{$order_user_name}', '{$order_user_email}', '{$order_date}', '{$user_id}', 'pending')";
                $insert_order_query = mysqli_query($connection, $query);

                if (!$insert_order_query) {
                    die("Query Failed" . mysqli_error($connection));
                } else {
                    $successMsg = "<p class='text-center text-bold text-success'>Payment Successful! <a href='orders.php'>track order <span class='mdi mdi-car'></span></a></p>";
                }
            } else {

                echo "<p class='text-danger'>Invalid Details!</p>";
            }
        }
        ?>

        <?php
        if (isset($successMsg)) {
            echo $successMsg;
        }
        ?>
        <form action="" method="POST">
            <div class="container mt-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Choose Payment Type</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="order_payment_type">Payment Method</label>
                                <select id="order_payment_type" name="order_payment_type" class="form-control">
                                    <option value="creditCard">Credit Card</option>
                                    <option value="debitCard">Debit Card</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container my-5">
                    <hr>
                    <?php
                    while ($row = mysqli_fetch_assoc($slect_cart_query)) {
                        $cart_quantity = $row['cart_quantity'];
                        $cart_price = $row['cart_price'];
                    }
                    ?>


                    <div class="clearfix">
                        <h5 class="mt-n2 font-weight-normal float-left">Total Quantity:</h5>
                        <?php
                        $query = "SELECT SUM(cart_quantity) AS total_quantity FROM carts WHERE user_cart_id = {$user_id}";
                        $select_quantity_query = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($select_quantity_query);
                        $total_quantity_sum = $row['total_quantity'];

                        echo "<span class='badge badge-dark float-right p-2'>$total_quantity_sum</span>";
                        ?>
                    </div>

                    <div class="clearfix mt-2">
                        <h5 class="mt-n2 font-weight-normal float-left">Total Price:</h5>
                        <?php
                        $query = "SELECT SUM(cart_price * cart_quantity) AS total_price FROM carts WHERE user_cart_id = {$user_id}";
                        $select_price_query = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($select_price_query);
                        $total_price_sum = $row['total_price'];

                        echo "<span class='badge badge-dark float-right p-2'>$$total_price_sum</span>";
                        ?>
                    </div>

                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Want to Chnage Delivery Details?</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                            $query = "SELECT * FROM userslist WHERE user_id = {$user_id}";
                            $slect_user_query = mysqli_query($connection, $query);

                            if (!$slect_user_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_assoc($slect_user_query)) {
                                $user_name = $row['user_name'];
                                $user_email = $row['user_email'];
                                $user_address = $row['user_address'];
                            ?>
                                <label for="address">Username:</label>
                                <input type="text" name="order_user_name" class="form-control" id="address" value="<?php echo $user_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Email:</label>
                            <input type="email" name="order_user_email" class="form-control" id="address" value="<?php echo $user_email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Delivery Address:</label>
                            <input type="address" name="order_address" class="form-control" id="address" value="<?php echo $user_address; ?>">
                        </div>
                    <?php
                            }
                    ?>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" popovertarget="map">
                            View Map
                        </button>
                        <div id="map" popover>
                            <iframe width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d779.4830352818307!2d11.1644314!3d10.2877689!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10ffd07faadbda75%3A0x125ec8c08638d2dd!2sSan%20Hussein%20Shopping%20Mall!5e1!3m2!1sen!2sng!4v1724877115376!5m2!1sen!2sng"></iframe>
                            <!-- <iframe src="https://maps.app.goo.gl/pNrjcYKombsNo6yr7" width="400" height="300" frameborder="0"></iframe> -->
                        </div>
                    </div>
                    </div>
                </div>



                <!-- 
        data-toggle="popover" data-html="true"
 data-content="<iframe width='100%' height='150' style='border:0;' src='https://www.google.com/maps/embed?...'></iframe>"
-->



                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Confirm Payment</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        echo "<p>Total Amount: $$total_price_sum</p>"; ?>
                        <input type="hidden" name="order_total_price" value="<?php echo $total_price_sum; ?>">
                        <input type="hidden" name="order_total_quantity" value="<?php echo $total_quantity_sum; ?>">
                        <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
                        <input type="hidden" name="order_user_id" value="<?php echo $user_id; ?>">
                        <input type="submit" name="pay" class="btn btn-success btn-block" value="Confirm and Pay">
                    </div>
                </div>
            </div>
        <?php
    }
        ?>


        </form>

        <!--********************** End of Main **********************-->
        <?php include "includes/user_footer.php" ?>
</body>

</html>