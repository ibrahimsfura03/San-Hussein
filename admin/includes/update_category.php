<form action="" method="POST">
    <div class="form-group">
        <label for="edit_category">Update Category</label>
        <!-- ./categories.php -->

        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM category WHERE cat_id = {$cat_id} ";
            $select_category_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_category_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];


        ?>

                <input type="text" value="<?php if (isset($cat_title)) {
                                                echo $cat_title;
                                            } ?>" name="cat_title" id="cat_title" class="form-control">



        <?php
            }
        }
        ?>

        <?php
        if (isset($_POST['edit_category'])) {
            $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
            $edit_cat_query = mysqli_query($connection, $query);

            if (!$edit_cat_query) {
                die("queryfaled" . mysqli_error($connection));
            }
        }

        ?>



    </div>
    <input type="submit" name="edit_category" value="Update" class="btn btn-sm btn-outline-danger btn-block">
</form>