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






    <!-- body content -->
    <section class="notify">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h4 class="card-text text-center text-info py-4">
                            Notification <span class="mdi mdi-bell"></span>
                        </h4>
                        <div class="clearfix mx-4 mb-1">
                            <h6 class="font-weight-normal float-left">Un-Open <span class="badge badge-warning"></span></h6>
                            <button class="btn btn-outline-info float-right">Clear Notification <span class="mdi mdi-bell-remove-outline"></span></button>
                        </div>
                        <hr class="mx-4">
                        <ul class="list-group mx-4 mb-2">
    <?php
    // Initialize notifications arrays
    $order_notifications = array();
    $user_notifications = array();

    // Get order notifications
    $query = "SELECT * FROM orders WHERE order_status = 'pending' OR order_status = 'Deliverd'";
    $select_order_query = mysqli_query($connection, $query);
    if (mysqli_num_rows($select_order_query) > 0) {
        while ($row = mysqli_fetch_assoc($select_order_query)) {
            if ($row['order_status'] == 'Deliverd') {
                $order_notifications[] = "<a href='deliverd_order.php' class='list-group-link text-dark notifylink'>
                    <li class='list-group-item'>
                        <p>Order has been delivered to {$row['order_user_name']} at {$row['order_address']} <small class='float-right'>{$row['order_date']}</small></p>
                    </li>
                </a>";
            } elseif ($row['order_status'] == 'pending') {
                $order_notifications[] = "<a href='orders.php' class='list-group-link text-dark notifylink'>
                    <li class='list-group-item'>
                        <p>New order has been placed successfully <small class='float-right'>{$row['order_date']}</small></p>
                    </li>
                </a>";
            }
        }
    }

    // Get user notifications
    $query = "SELECT * FROM userslist";
    $select_users_query = mysqli_query($connection, $query);
    if (mysqli_num_rows($select_users_query) > 0) {
        while ($row = mysqli_fetch_assoc($select_users_query)) {
            $user_notifications[] = "<a href='users.php' class='list-group-link text-dark notifylink'>
                <li class='list-group-item'>
                    <p>New user has created an account ({$row['user_name']}) <small class='float-right'>" . date('Y-m-d') . "</small></p>
                </li>
            </a>";
        }
    }

    // Combine all notifications
    $all_notifications = array_merge($order_notifications, $user_notifications);

    // Display notifications or a "No notifications" message if none exist
    if (empty($all_notifications)) {
        echo "<li class='list-group-item text-center'>No notifications</li>";
    } else {
        foreach ($all_notifications as $notification) {
            echo $notification;
        }
    }
    ?>
</ul>




                        <!-- ///////*******************///////////// */ -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of main body -->








    <!--
************************************************************************************************* -->







    <!--********************** End of Main **********************-->
    <div class="footer"></div>

    <div class="footer bg-warning"></div>
    <?php include "includes/admin_footer.php" ?>