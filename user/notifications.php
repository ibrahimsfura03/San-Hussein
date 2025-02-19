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
                            <h6 class="font-weight-normal float-left">Un-Open <span class="badge badge-warning"> </span></h6>
                            <button class="btn btn-outline-info float-right">Clear Notification <span class="mdi mdi-bell-remove-outline"></span></button>
                        </div>
                        <hr class="mx-4">
                        <ul class="list-group mx-4 mb-2">
    <?php
    // Order Notifications
    if (isset($_GET['order_profile'])) {
        $user_id = $_GET['order_profile'];
    }
    $order_query = "SELECT * FROM orders WHERE order_user_id = {$user_id} AND (order_status = 'pending' OR order_status = 'Deliverd')";
    $select_order_query = mysqli_query($connection, $order_query);
    if (mysqli_num_rows($select_order_query) > 0) {
        while ($row = mysqli_fetch_assoc($select_order_query)) {
            $order_id = $row['order_id'];
            $order_status = $row['order_status'];
            $order_date = $row['order_date'];

            if ($order_status == 'Deliverd') {
                $deliverd = "<p>Your Order has been delivered successfully <small class='float-right'>$order_date</small></p>";
                echo "<a href='orders.php' class='list-group-link text-dark notifylink'>
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
        }
    }

    // Cart Notifications
    if (isset($_GET['update_profile'])) {
        $the_user_id = $_GET['update_profile'];
    }
    $cart_query = "SELECT * FROM carts WHERE user_cart_id = {$the_user_id}";
    $select_cart_query = mysqli_query($connection, $cart_query);
    if (mysqli_num_rows($select_cart_query) > 0) {
        while ($row = mysqli_fetch_assoc($select_cart_query)) {
            $cart_name = $row['cart_name'];
            $cart_quantity = $row['cart_quantity'];
            $cart_price = $row['cart_price'];
            $cart_date = date('Y-m-d');
            $total_product_price = $cart_quantity * $cart_price;
            echo "<a href='cart.php' class='list-group-link text-dark notifylink'>
                     <li class='list-group-item'>
                         ($cart_quantity) $cart_name has been added to cart at $$total_product_price <small class='float-right'>$cart_date</small>
                     </li>
                  </a>";
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
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<?php include "includes/user_footer.php" ?>