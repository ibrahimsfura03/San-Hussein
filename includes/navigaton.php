<?php ob_start(); ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="toggleNav">
        <ul class="navbar-nav">

            <?php
            $query = "SELECT * FROM category";
            $select_cat_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_cat_query)) {
                $cat_title = $row['cat_title'];

                echo " <li class='nav-item navLink'>
                <a href='#' class='nav-links'>{$cat_title}</a>
            </li>";
            }
            if (!$select_cat_query) {
                die("QueryFailed" . mysqli_error($connection));
            }

            ?>


        </ul>
    </div>
    <div class="d-flex justify-content-end">
        <form action="search.php" class="inline-form d-sm-block">
            <div class="input-group">
                <input type="search" name="search" placeholder="search products..." class="form-control form-control-sm">
                <div class="input-group-prepend">
                    <button type="submit" name="submit" class="btn btn-warning btn-sm"> <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                        </svg> </button>
                </div>
            </div>
        </form>
    </div>
</nav>