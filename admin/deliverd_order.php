<?php session_start(); ?>
<?php ob_start(); ?>

<?php
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<?php include "includes/admin_header.php";
include "../includes/db.php";
?>

<!--********************** Header **********************-->




<?php include "includes/navigation.php" ?>




<div class="main">
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Explore more on our Blog <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to explore.</a>
    </div>
    <!--********************* main notify **********************-->

    <?php
    $query = "SELECT * FROM orders WHERE order_status = 'deliverd' ";
    $select_all_orders_query = mysqli_query($connection, $query);

    if (!$select_all_orders_query) {
        die("Query failed") . mysqli_error($connection);
    }
    ?>

    <!--
************************************************************************************************* -->

    <div class="container my-4">

        <div class="container mt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href='orders.php' class='nav-link'>View All Orders</a>
                </li>
                <li class="nav-item">
                    <a href="placed_order.php" class="nav-link">Placed Orders</a>
                </li>
                <li class="nav-item">
                    <a href="pending_order.php" class="nav-link">Pendind Orders</a>
                </li>
                <li class="nav-item">
                    <a href="deliverd_order.php" class="nav-link active">Deliverd Orders</a>
                </li>
            </ul>
            <hr>

            <table class="table table-striped table-borderd table-hover">
                <thead class="bg-dark text-light">
                    <th>ID</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Address</th>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Delete</th>
                </thead>
                <tbody class="">

                    <?php
                    while ($row = mysqli_fetch_assoc($select_all_orders_query)) {
                        $order_id = $row['order_id'];
                        $order_price = $row['order_total_price'];
                        $order_quantity = $row['order_total_quantity'];
                        $order_status = $row['order_status'];
                        $order_payment = $row['order_payment_type'];
                        $order_address = $row['order_address'];
                        $order_user_name = $row['order_user_name'];
                        $order_user_email = $row['order_user_email'];
                        $order_date = $row['order_date'];
                        $order_user_id = $row['order_user_id'];




                        echo "<tr>";
                        echo "<td>$order_id</td>";
                        echo "<td>$$order_price</td>";
                        echo "<td>$order_quantity</td>";
                        echo "<td>$order_status</td>";
                        echo "<td>$order_payment</td>";
                        echo "<td>$order_address</td>";
                        echo "<td><a href='users.php?u_name={$order_user_id}'>$order_user_name</a></td>";
                        echo "<td>$order_date</td>";
                        echo "<td><a href='deliverd_order.php?delete={$order_id}' class='text-danger'>delete</a></td>";
                        echo " </tr>";
                    }

                    ?>





                    <!-- ************************DELETE**************************** -->
                    <?php
                    if (isset($_GET['delete'])) {
                        $delete_order = $_GET['delete'];

                        $query = "DELETE FROM orders WHERE order_id = {$delete_order}";
                        $delete_order_query = mysqli_query($connection, $query);

                        // header("Location: deliverd_order.php");
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!--
*************************************************************************************************** -->




    </div>
    <!--********************** End of Main **********************-->
    <div class="footer"></div>

    <div class="footer bg-warning"></div>
    <?php include "includes/admin_footer.php" ?>