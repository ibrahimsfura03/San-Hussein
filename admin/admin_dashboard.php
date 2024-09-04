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

<style>
    /* * {
        border: 1px solid red;
    } */

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-footer {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>

<div class="main">
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Explore more on our Blog <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to explore.</a>
    </div>
    <!--********************* main notify **********************-->




    <!--
************************************************************************************************* -->





    <div class="container my-3">
        <div class="row">
            <div class="col-lg-2 col-md-4 mb-4 px-2">
                <div class="card text-white bg-danger">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-file-text fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">

                            <?php
                            $query = "SELECT * FROM category";
                            $select_cateory_query = mysqli_query($connection, $query);
                            $category_count = mysqli_num_rows($select_cateory_query);

                            echo "<div class='display-4'>$category_count</div>";
                            ?>

                            <div>Categories</div>
                        </div>
                    </div>
                    <a href="categories.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class=""></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 px-2">
                <div class="card text-white bg-success">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-comments fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">

                            <?php
                            $query = "SELECT * FROM userslist";
                            $select_users_query = mysqli_query($connection, $query);
                            $users_count = mysqli_num_rows($select_users_query);

                            echo "<div class='display-4'>$users_count</div>";
                            ?>
                            <div>Users</div>
                        </div>
                    </div>
                    <a href="users.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 px-2">
                <div class="card text-white bg-info">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-shopping-cart fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">

                            <?php
                            $query = "SELECT * FROM products";
                            $select_product_query = mysqli_query($connection, $query);
                            $product_count = mysqli_num_rows($select_product_query);

                            echo "<div class='display-4'>$product_count</div>";
                            ?>
                            <div>Products</div>
                        </div>
                    </div>
                    <a href="products.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 px-2">
                <div class="card text-white bg-secondary">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-shopping-cart fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">

                            <?php
                            $query = "SELECT * FROM orders WHERE order_status = 'placed' OR order_status = 'Deliverd' ";
                            $select_orders_query = mysqli_query($connection, $query);
                            $orders_count = mysqli_num_rows($select_orders_query);

                            echo "<div class='display-4'>$orders_count</div>";
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
            <div class="col-lg-2 col-md-4 mb-4 px-2">
                <div class="card text-white bg-primary">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-shopping-cart fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">
                    <?php
                    $query = "SELECT * FROM admin_list";
                    $select_admin_query = mysqli_query($connection, $query);
                    $admin_count = mysqli_num_rows($select_admin_query);

                    echo "<div class='display-4'>$admin_count</div>";
                    ?>

                            <div>Admins</div>
                        </div>
                    </div>
                    <a href="admin.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 px-2">
                <div class="card text-white bg-warning">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa fa-shopping-cart fa-3x"></i>
                        </div>
                        <div class="text-end flex-grow-1">
                            <div class='display-4 text-dark'>000</div>
                            <div class="text-dark">Drivers</div>
                        </div>
                    </div>
                    <a href="admin.php" class="card-footer text-white text-decoration-none d-flex justify-content-between">
                        <span>View Details</span>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>




    <!--
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>