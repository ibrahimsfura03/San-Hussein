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

                            $query = "SELECT * FROM orders WHERE order_status = 'pending' OR order_status = 'Deliverd' ";
                            $select_order_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_order_query)) {
                                $order_id = $row['order_id'];
                                $order_status = $row['order_status'];
                                $order_date = $row['order_date'];
                                $order_address = $row['order_address'];
                                $order_user_name = $row['order_user_name'];
                            }
                            if ($order_status == 'Deliverd') {
                                $deliverd = "<p>Order has been deliverd to $order_user_name at $order_address <small class='float-right'>$order_date</small></p>";

                                echo "<a href='deliverd_order.php' class='list-group-link text-dark notifylink'>
                                     <li class='list-group-item'>
                                         $deliverd 
                                     </li>
                                 </a>";
                            } elseif ($order_status == 'pending') {
                                $pending = "<p>New Order has been Placed successfully <small class='float-right'>$order_date</small></p>";

                                echo "<a href='orders.php' class='list-group-link text-dark notifylink'>
                                     <li class='list-group-item'>
                                         $pending 
                                     </li>
                                 </a>";
                            }


                            ?>

                            <?php

                                $query = "SELECT * FROM userslist";
                                $select_users_query = mysqli_query($connection, $query);


                            while ($row = mysqli_fetch_assoc($select_users_query)) {
                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $date = date('Y-m-d');
                    }
                    

                            echo "<a href='users.php' class='list-group-link text-dark notifylink'>
                                <li class='list-group-item'>
                                    New user has created account ($user_name) <small class='float-right'>$date</small>
                                </li>
                            </a>";

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