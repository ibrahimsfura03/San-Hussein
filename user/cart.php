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

    <?php

    ?>

<?php
// Fetch carts with newest products appearing first
$query = "SELECT * FROM carts WHERE user_cart_id = {$user_id} ORDER BY cart_id DESC";
$slect_cart_query = mysqli_query($connection, $query);
?>

    <?php
    if (isset($_GET['update_profile'])) {
        $the_user_id = $_GET['update_profile'];
    }
    ?>
    <!--
************************************************************************************************* -->



    <!-- body content -->
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-herader pt-3">
                        <h3 class="text-center text-info font-weight-normal">Cart <span class="mdi mdi-cart-outline"></span></h3>
                    </div>
                    <div class="clearfix mb-1">
                        <div class="btn-group ml-4">
                            <?php
                            echo "<a href='cart.php?clearcart={$user_id}'>
                                <button class='btn btn-outline-info btn-sm text-bold'>Clear Carts<span class='mdi mdi-cart-outline'></span>
                                </button>
                            </a>";
                            ?>
                            <?php
                            if (isset($_GET['clearcart'])) {
                                $clear_cart = $_GET['clearcart'];

                                $query = "DELETE FROM carts WHERE user_cart_id = {$user_id}";
                                $clear_cart_query = mysqli_query($connection, $query);

                                header("Location: cart.php");
                            }
                            ?>
                        </div>
                        <div class="btn-group mr-4 float-right">
                            <buton class="btn btn-outline-info btn-sm">
                                <?php
                                $query = "SELECT * FROM carts WHERE user_cart_id = {$user_id}";
                                $select_all_cart_query = mysqli_query($connection, $query);
                                $carts_count = mysqli_num_rows($select_all_cart_query);

                                echo "<h5><small>Total Items <span class='badge badge-danger'>{$carts_count}</span></small></h5>";
                                ?>
                            </buton>
                        </div>
                    </div>
                    <div class="card-body mt-n4">

                        <?php
                        while ($row = mysqli_fetch_assoc($slect_cart_query)) {
                            $cart_id = $row['cart_id'];
                            $product_id = $row['product_cart_id'];
                            $cart_name = $row['cart_name'];
                            $cart_image = $row['cart_image'];
                            $cart_quantity = $row['cart_quantity'];
                            $cart_price = $row['cart_price'];

                        ?>

                            <div class="meadia border p-1 my-2 d-flex">
                                <?php
                                echo "<img src='../image/$cart_image' alt='product Image' style='width: 70px; height: 95px;'>";
                                ?>
                                <div class="meadia-body w-100">
                                    <h5 class='ml-3 font-weight-normal'><small><?php echo $cart_name; ?></small></h5>
                                    <div class=" clearfix w-100">
                                        <div class="float-left ml-3">
                                            <p class="">QYT: <i class=""><?php echo $cart_quantity; ?></i> </p>
                                            <?php
                                            echo "<a href='cart.php?removecart={$cart_id}'>
                                                      <button class='btn btn-danger mb-1'><small>Remove Item</small> <span class='mdi mdi-delete'></span>
                                                      </button>
                                                  </a>";
                                            ?>
                                            <?php
                                            if (isset($_GET['removecart'])) {
                                                $delete_cart = $_GET['removecart'];

                                                $query = "DELETE FROM carts WHERE cart_id = {$delete_cart}";
                                                $delete_cart_query = mysqli_query($connection, $query);

                                                header("Location: cart.php");
                                            }
                                            ?>
                                        </div>
                                        <h4 class="float-right  font-weight-normal"><small>$<?php echo $cart_price * $cart_quantity; ?></small></h4>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <hr>

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

                        <!-- <div class="clearfix">
                            <h5 class="mt-n2 font-weight-normal float-left">Total Quantity: </h5>
                            <?php
                            $query = "SELECT cart_quantity FROM carts WHERE user_cart_id = {$user_id}";
                            $select_all_cart_query = mysqli_query($connection, $query);
                            $cart_quantity_count = mysqli_num_rows($select_all_cart_query);


                            $sum = 0;

                            while ($row = mysqli_fetch_assoc($select_all_cart_query)) {
                                $sum += $row['cart_quantity'];
                                $total_quantity_sum = $sum;
                            }

                            echo "<span class='badge badge-dark float-right p-2'>$total_quantity_sum</span>";

                            ?>
                        </div>


                        <div class="clearfix mt-2">
                            <h5 class="mt-n2 font-weight-normal float-left">Total Price: </h5>
                            <?php
                            // $query = "SELECT cart_price FROM carts WHERE user_cart_id = {$user_id}";
                            //     $select_all_cart_query = mysqli_query($connection, $query);
                            //     $cart_price_count = mysqli_num_rows($select_all_cart_query);

                            //     // echo $cart_price_count;

                            //     $sum = 0;
                            //     for($j = 0; $j <= $cart_price_count; $j++){
                            //         $sum += $j;
                            //         echo $sum . "<br>";
                            //     }

                            $query = "SELECT cart_price FROM carts WHERE user_cart_id = {$user_id}";
                            $select_all_cart_query = mysqli_query($connection, $query);
                            $cart_price_count = mysqli_num_rows($select_all_cart_query);


                            $sum = 0;

                            while ($row = mysqli_fetch_assoc($select_all_cart_query)) {
                                $sum += $row['cart_price'];
                                $total_price_sum = $sum * $total_quantity_sum;

                                if (($total_price_sum) == 0) {
                                    echo "<div class='text-center'>Empty:(</div>";
                                }
                            }

                            echo "<span class='badge badge-dark float-right p-2'>$$total_price_sum</span>";
                            ?>
                        </div> -->

                        <div class="pt-2 w-100">
    <a href='../index_access.php'>
        <button class='btn btn-info btn-block my-2'>Continue Shipping <span class='mdi mdi-cart-outline'></span></button>
    </a>
    <?php
    if (isset($_SESSION['user_id']) && $carts_count > 0) {
        $user_id = $_SESSION['user_id'];
        echo "<a href='payment.php?p_id={$user_id}' class=''>
            <button class='btn btn-info btn-block'>Continue to <strong>Check Out</strong> <span class='mdi mdi-checkbox-marked-circle-outline'></span></button>
        </a>";
    }
    ?>
</div>

                    </div>
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