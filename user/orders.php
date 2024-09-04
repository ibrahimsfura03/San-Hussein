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
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 mb-5 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>For advertisments <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to promote your products.</a>
    </div>
    <!--********************* main notify **********************-->




    <!--
************************************************************************************************* -->



    <!-- body content -->


    <div class="container my-5">
        <h2 class="text-center mb-4">Your Orders</h2>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Order Row -->
                            <?php
                            if (isset($_GET['order_profile'])) {
                                $the_user_id = $_GET['order_profile'];
                            }
                            if (isset($the_user_id)) {
                                $query = "SELECT * FROM orders WHERE order_user_id = {$the_user_id} AND (order_status = 'placed' OR order_status = 'Deliverd' OR order_status = 'pending')";
                                // Execute query...
                                $select_cart_query = mysqli_query($connection, $query);

                                if (mysqli_num_rows($select_cart_query) == 0) {
                                    echo "<tr><td colspan='8' class='text-center'>No orders :(</td></tr>";
                                }
                            }
                            // $query = "SELECT * FROM orders WHERE order_user_id = {$the_user_id} AND order_status = 'placed' OR order_status = 'Deliverd' OR order_status = 'pending'";

                            while ($row = mysqli_fetch_assoc($select_cart_query)) {
                                $order_id = $row['order_id'];
                                $order_price = $row['order_total_price'];
                                $order_quantity = $row['order_total_quantity'];
                                $order_status = $row['order_status'];
                                $order_date = $row['order_date'];
                                $order_user_id = $row['order_user_id'];

                                if (empty($row)) {
                                    echo "No orders :(";
                                }

                            ?>


                                <?php

                                echo "<tr>";
                                echo "<td>$order_id</td>";
                                echo "<td>$$order_price</td>";
                                echo "<td>$order_quantity</td>";
                                echo "<td><i>$order_status</i></td>";
                                echo "<td><a href='orders.php?sign={$order_id}' class='btn btn-info btn-sm'>Sign</a></td>";



                                if ($order_status == 'Deliverd') {
                                    echo "<td><span class='badge bg-success text-light'>Successful</span></td>";
                                } elseif ($order_status == 'pending') {
                                    echo "<td><span class='badge bg-warning text-dark'>Pending</span></td>";
                                } elseif ($order_status == 'placed') {
                                    echo "<td><span class='badge bg-info text-dark'>Placed</span></td>";
                                } else {
                                    echo "<td><span class='badge bg-danger text-light'>Failed</span></td>";
                                }

                                echo "<td>$order_date</td>";
                                echo "<td><a href='orders.php?delete={$order_id}' class='text-danger'>delete</a></td>";
                                echo " </tr>";
                                ?>

                            <?php
                            }
                            ?>

                            <!-- /********************************SIGN***********************/ -->

                            <?php
                            if (isset($_GET['sign'])) {
                                $the_sign = $_GET['sign'];


                                $query = "UPDATE orders SET  order_status = 'Deliverd' WHERE order_id = {$the_sign} AND order_status = 'placed'";
                                $sign_query = mysqli_query($connection, $query);

                                header("Location: orders.php");
                            }
                            ?>



                            <!-- ************************DELETE**************************** -->
                            <?php
                            if (isset($_GET['delete'])) {
                                $delete_order = $_GET['delete'];

                                $query = "DELETE FROM orders WHERE order_id = {$delete_order}";
                                $delete_order_query = mysqli_query($connection, $query);

                                header("Location: orders.php");
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- end of main body -->




    <!--
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<?php include "includes/user_footer.php" ?>