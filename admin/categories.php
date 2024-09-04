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

    <!--
************************************************************************************************* -->

    <!-- ---------------ADDCATEGORY-------------------- -->
    <?php
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            $errmsg = "<p class='text-danger float-right'>Invald Inputs!</p>";
        } else {
            $query = "INSERT INTO category (cat_title) ";
            $query .= "VALUES('{$cat_title}')";

            $insert_cat_query = mysqli_query($connection, $query);


            if (!$insert_cat_query) {
                die("Queryfaled" . mysqli_error($connection));
            }
        }
    }
    ?>

    <!-- -----------------------DELETECATEGORY--------------------------- -->

    <?php
    if (isset($_GET['delete'])) {
        $delete_category = $_GET['delete'];
        $query = "DELETE FROM category WHERE cat_id = {$delete_category}";
        $delete_category_query = mysqli_query($connection, $query);
        // header("Location: categories.php");
    }
    ?>





    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">

                <form action="" method="POST" class="mb-5">
                    <div class="form-group">
                        <?php
                        if (isset($errmsg)) {
                            echo $errmsg;
                        }
                        ?>
                        <label for="add-category">Add Category</label>
                        <input type="text" name="cat_title" class="form-control">
                    </div>
                    <input type="submit" value="Add Category" name="submit" class="btn btn-outline-primary btn-sm btn-block">
                </form>


                <!-- ---------------------------EDTCATEGORY-------------------------- -->

                <?php
                if (isset($_GET['edit'])) {
                    $the_cat_id = $_GET['edit'];
                    include("includes/update_category.php");
                }
                ?>


            </div>

            <div class="col-md-6 mt-4">
                <table class="table table-stripped table-hover table-sm">
                    <thead class="">
                        <th>ID</th>
                        <th>Category Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>

                        <?php
                        $query = "SELECT * FROM category";
                        $select_product_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_product_query)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                            echo "<td><a class='text-danger' href='categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
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