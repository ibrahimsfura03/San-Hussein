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
    if (isset($_POST['create'])) {
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];

        $product_image = '';
        $product_image_tmp = '';

        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp, "../image/$product_image");

        $product_quantity = $_POST['product_quantity'];
        $product_tag = $_POST['product_tag'];
        $product_description = $_POST['product_description'];


        $query = "INSERT INTO products (product_name, product_category, product_price, product_image, product_tag, product_description) ";
        $query .= "VALUES ('{$product_name}', '{$product_category}', '{$product_price}', '{$product_image}', '{$product_tag}', '{$product_description}')";

        $create_products_query = mysqli_query($connection, $query);
    }
    ?>


    <!--
************************************************************************************************* -->

    <div class="container mt-4">

        <ul class="nav nav-tabs">
            <li class="nav-item"><a href='products.php' class='nav-link'>View All Products</a>
            </li>
            <li class="nav-item">
                <a href="add_products.php" class="nav-link active">Add Products</a>
            </li>
        </ul>
        <hr>

        <form action="" class="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name" class="">
                    <h6>Product Name</h6>
                </label>
                <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_category" class="">
                    <h6>Product Category</h6>
                </label><br>
                <select name="product_category" class="form-control" id="">
                    <option value="">Select Category</option>
                    <?php
                    $query = "SELECT * FROM category";
                    $select_category_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_category_query)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="product_price" class="">
                    <h6>Product Price</h6>
                </label>
                <input type="number" name="product_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="image" class="">
                    <h6>Product Image</h6>
                </label><br>
                <input type="file" name="product_image" class="">
            </div>
            <div class="form-group">
                <label for="product_quantity" class="">
                    <h6>Product Quantity</h6>
                </label>
                <input type="number" min="1" maxlength="100" value="1" name="product_quantity" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_tag" class="">
                    <h6>Product Tag</h6>
                </label>
                <input type="text" name="product_tag" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_description" class="">
                    <h6>Product Description</h6>
                </label>
                <input type="text" name="product_description" class="form-control">
            </div>
            <input type="submit" name="create" value="Add Product" class="btn btn-info btn-block my-3">
        </form>
    </div>


</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>