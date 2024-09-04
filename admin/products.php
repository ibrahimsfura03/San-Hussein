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


    <div class="container mt-4">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href='products.php' class='nav-link active'>View All Products</a>
            </li>
            <li class="nav-item">
                <a href="add_products.php" class="nav-link">Add Products</a>
            </li>
        </ul>
        <hr>
        <table class="table table-striped table-hover">
            <thead class="table-header">
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Purchased</th>
                <th>Description</th>
                <th>Tags</th>
                <th>View Product</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>



                <?php
                $query = "SELECT * FROM products";
                $select_product_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_product_query)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_category = $row['product_category'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    $product_quantity = $row['product_quantity'];
                    $product_purchase = $row['product_purchase'];
                    $product_tag = $row['product_tag'];
                    $product_description = $row['product_description'];

                ?>

                <?php

                    echo  "<tr>";
                    echo "<td>{$product_id}</td>";
                    echo "<td>{$product_name}</td>";


                    $query = "SELECT * FROM category WHERE cat_id = {$product_category}";
                    $select_category_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_category_query)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];


                        echo "<td>{$cat_title}</td>";
                    }

                    echo "<td> <img src='../image/$product_image' alt='img' width='30'> </td>";
                    echo "<td>{$product_price}</td>";
                    echo "<td>{$product_quantity}</td>";
                    echo "<td>{$product_purchase}</td>";
                    echo "<td>{$product_description}</td>";
                    echo "<td>{$product_tag}</td>";
                    echo "<td><a href='../index.php?p_id={$product_id}'>View</a></td>";
                    echo "<td><a href='edit_product.php?p_id={$product_id}'>edit</a></td>";
                    echo "<td><a href='view_all_products.php?delete={$product_id}' class='text-danger'>delete</a></td>";
                    echo "</tr>";
                }
                ?>

                <?php
                if (isset($_GET['delete'])) {
                    $delete_product_id = $_GET['delete'];

                    $query = "DELETE FROM products WHERE product_id = {$delete_product_id}";
                    $delete_product_query = mysqli_query($connection, $query);

                    echo "<td><a href='view_all_products.php?delete={$product_id}' class='text-danger' onclick=\"return confirm('Are you sure you want to delete this product?');\">delete</a></td>";

                    // header("Location: view_all_products.php");
                }
                ?>


            </tbody>
        </table>
    </div>


</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>