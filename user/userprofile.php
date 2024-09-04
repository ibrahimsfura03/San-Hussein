<?php ob_start(); ?>

<?php include "includes/user_header.php";
include "../includes/db.php";
?>

<?php
if (!isset($_SESSION['user_name'])) {
    header("Location: ../login.php");
    exit();
}

?>

<?php include("includes/user_navigation.php"); ?>



<!--********************** End of Header **********************-->
<!--********************** SideNav **********************-->

<!--********************** Main **********************-->
<div class="main">
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>For advertisments <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to promote your products.</a>
    </div>
    <!--********************* main notify **********************-->

    <!--
************************************************************************************************* -->





    <!--
*************************************************************************************************** -->



    <!-- /.row -->

    <div class="container my-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-file-text fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">


                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $the_user_id = $_SESSION['user_id'];

                                $query = "SELECT * FROM carts WHERE user_cart_id = {$the_user_id}";
                                $select_all_cart_query = mysqli_query($connection, $query);
                                $carts_count = mysqli_num_rows($select_all_cart_query);

                                if (($carts_count) == 0) {
                                    echo "<div class='text-center'>No Carts :(</div>";
                                }

                                echo "<div class='display-4'>$carts_count</div>";
                            }
                            ?>


                            <div>Carts</div>
                        </div>
                    </div>
                    <a href="cart.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-comments fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">

                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $the_user_id = $_SESSION['user_id'];

                                // $query = "SELECT * FROM orders WHERE order_user_id = {$the_user_id} AND order_status = 'Deliverd' OR order_user_id = {$the_user_id} AND order_status = 'placed' ";
                                if (isset($the_user_id)) {
                                    $query = "SELECT * FROM orders WHERE order_user_id = {$the_user_id} AND (order_status = 'placed' OR order_status = 'Deliverd' OR order_status = 'pending')";
                                    $select_all_orders_query = mysqli_query($connection, $query);
                                    $orders_count = mysqli_num_rows($select_all_orders_query);

                                    if (($orders_count) == 0) {
                                        echo "<div class='text-center'>No orders :(</div>";
                                    }
                                    echo "<div class='display-4'>$orders_count</div>";
                                }
                            }
                            ?>

                            <div>Orders</div>
                        </div>
                    </div>
                    <a href="orders.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-shopping-cart fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $the_user_id = $_SESSION['user_id'];

                                $query = "SELECT * FROM orders WHERE order_user_id = {$the_user_id} AND order_status = 'Deliverd'";
                                $select_all_transactions_query = mysqli_query($connection, $query);
                                if (!$select_all_transactions_query) {
                                    die("QUERY FAILED: " . mysqli_error($connection));
                                }

                                $transaction_count = mysqli_num_rows($select_all_transactions_query);
                                if ($transaction_count == 0) {
                                    echo "<div class='text-center'>No transactions :(</div>";
                                }
                                echo "<div class='display-4'>$transaction_count</div>";
                            }
                            ?>
                            <div>Transactions</div>
                        </div>

                        <!-- (order_status = 'placed' OR -->
                    </div>
                    <a href="transactions.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>





    <!-- /.row -->




</div>
<!--********************** End of Main **********************-->
<?php include "includes/user_footer.php" ?>