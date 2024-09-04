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
    if (isset($_GET['p_id'])) {
        $the_product_id = $_GET['p_id'];
    } else {
        echo "Product Unavailable";
    }
    $query = "SELECT * FROM products WHERE product_id = {$the_product_id}";
    $select_product_id_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_product_id_query)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_category = $row['product_category'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
        $product_tag = $row['product_tag'];
        $product_description = $row['product_description'];
    }


    if (isset($_POST['update'])) {
        $product_id = $_GET['p_id'];
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];

        $product_image = '';
        $product_image_tmp = '';

        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp, "../image/$product_image");

        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_tag = $_POST['product_tag'];
        $product_description = $_POST['product_description'];

        $query = "UPDATE products SET product_name = '{$product_name}', 
        product_category = '{$product_category}', product_image = '{$product_image}', 
        product_price = '{$product_price}', product_quantity = '{$product_quantity}', 
        product_description = '{$product_description}', 
        product_tag = '{$product_tag}' WHERE product_id = {$product_id}";

        $update_product_query = mysqli_query($connection, $query);

        if (!$update_product_query) {
            die("Query Failed" . mysqli_error($connection));
        }else{
            $successMsg = "<p class='text-success text-center text-bold'>Updated Successfully :) <a href='products.php'>view product!</a></p>";
        }

        // header("Location:view_all_products.php");
    }


    ?>




    <!--
************************************************************************************************* -->


    <div class="container mt-4">
        <form action="" class="" method="post" enctype="multipart/form-data">

        <?php
            if(isset($successMsg)){
                echo $successMsg;
            }
        ?>

            <div class="form-group">
                <label for="product_name" class="">
                    <h6>Product Name</h6>
                </label>
                <input type="text" value="<?php echo $product_name; ?>" name="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_category" class="">
                    <h6>Product Category</h6>
                </label><br>
                <select name="product_category" class="form-control" id="">
                    <option value="<?php echo $cat_title; ?>">Select Category</option>
                    <?php
                    $query = "SELECT * FROM category";
                    $select_category_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_category_query)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        if ($cat_id == $product_category) {
                            echo "<option value='{$cat_id}' selected>{$cat_title}</option>";
                        } else {
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="product_price" class="">
                    <h6>Product Price</h6>
                </label>
                <input type="number" value="<?php echo $product_price; ?>" name="product_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="image" class="">
                    <h6>Product Image</h6>
                </label><br>
                <img src="../image/<?php echo $product_image; ?>" alt="product image" width="100">
                <input type="file" name="product_image" class="">
            </div>
            <div class="form-group">
                <label for="product_quantity" class="">
                    <h6>Product Quantity</h6>
                </label>
                <input type="number" value="<?php echo $product_quantity; ?>" name="product_quantity" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_tag" class="">
                    <h6>Product Tag</h6>
                </label>
                <input type="text" value="<?php echo $product_tag; ?>" name="product_tag" class="form-control">
            </div>
            <div class="form-group">
                <label for="product_description" class="">
                    <h6>Product Description</h6>
                </label>
                <input type="text" value="<?php echo $product_description; ?>" name="product_description" class="form-control">
            </div>
            <input type="submit" name="update" value="Update Product" class="btn btn-warning btn-block my-3">
        </form>
    </div>


</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>