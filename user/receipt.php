<?php ob_start(); ?>
<?php include "../includes/db.php"; ?>

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


    <!--********************* main notify **********************-->

    <?php
    // if (isset($_SESSION['user_id'])) {
    //     $the_user_id = $_SESSION['user_id'];

    if (isset($_GET['r_id'])) {
        $receipt_id = $_GET['r_id'];
    }
    $query = "SELECT * FROM orders WHERE order_id = {$receipt_id} AND order_status = 'Deliverd' ";
    $select_order_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_order_query)) {
        $order_id = $row['order_id'];
        $order_date = $row['order_date'];
        $order_price = $row['order_total_price'];
        $order_address = $row['order_address'];
        $order_email = $row['order_user_email'];
        $order_user_name = $row['order_user_name'];
        $order_payment_type = $row['order_payment_type'];
        $order_quantity = $row['order_total_quantity'];
        $order_user_id = $row['order_user_id'];

        if (empty($row)) {
            echo "No orders :(";
        }

    ?>


        <!--
************************************************************************************************* -->



        <!-- body content -->


        <!--********************** Header **********************-->
        <div class="clearfix my-3 mx-2">
            <a href="transactions.php" class="">
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

                <!-- <a href="" class="mx-1"><span class="mdi mdi-bell-outline mdi-24px text-dark"><span class="badge badge-warning">8</span></span></a>
                <a href="../logout.php" class="mx-1"><span class="mdi mdi-logout mdi-24px text-dark"></span> -->
                </a>
            </div>
        </div>



        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card border-dark" id="receipt">
                        <div class="card-header text-center p-2">
                            <div class="navbar-brand">
                                <a href="index.php" class="nav-link text-dark">
                                    <h3 class="font-weight-bold"> <i>San-Hussein</i> </h3>
                                </a>
                            </div>
                            <h6 class="mb-0">Order Receipt</h6>
                        </div>
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between">
                                <p class="mb-1"><strong>ID:</strong> #<?php echo $order_id; ?></p>
                                <p class="mb-1 text-end"><strong>Date:</strong> <?php echo $order_date; ?></p>
                            </div>
                            <hr class="my-2">
                            <p class="mb-1"><strong>Order Details:</strong></p>
                            <ul class="list-unstyled mb-2">
                                <li><strong>Price:</strong> $<?php echo $order_price; ?></li>
                                <li><strong>Address:</strong> <?php echo $order_address; ?></li>
                                <li><strong>Email:</strong> <?php echo $order_email; ?></li>

                                <?php
                                // $query = "SELECT * FROM userslist WHERE user_id = {$the_user_id}";
                                // $select_user_query = mysqli_query($connection, $query);

                                // while ($row = mysqli_fetch_assoc($select_user_query)) {
                                //     $user_phone = $row['user_phone'];

                                //     echo "<li><strong>Phone:</strong>user_phone</li>";
                                // }
                                ?>

                            </ul>
                            <hr class="my-2">
                            <p class="mb-1"><strong>Additional Info:</strong></p>
                            <ul class="list-unstyled mb-2">
                                <li><strong>Payment:</strong> <?php echo $order_payment_type; ?></li>
                                <li><strong>Buyer:</strong> <?php echo $order_user_name; ?></li>
                            </ul>
                        </div>
                        <div class="card-footer text-center p-2">
                            <p class="mb-1">Thank you for your purchase!</p>
                            <small>Contact: support@sanhussein.com</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

    <div class="row justify-content-center mx-5">
        <div class="col-md-4">
            <button class="btn btn-primary mt-3 btn-block" onclick="printReceipt()">Print Receipt</button>
        </div>
    </div>

    <!-- end of main body -->




    <!--
*************************************************************************************************** -->




    <script>
        function printReceipt() {
            var printContents = document.getElementById('receipt').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>


    <!--********************** End of Main **********************-->
    <?php include "includes/user_footer.php" ?>