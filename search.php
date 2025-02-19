<?php
include "includes/header.php";
include "includes/db.php";
?>
<div class="header">
    <div class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="navbar-brand">
                <a href="index.php" class="nav-link text-dark">
                    <h3 class="font-weight-bold"><i>San-Hussein</i></h3>
                </a>
            </div>
        </nav>
        <?php include "includes/navigaton.php"; ?>
    </div>
</div>

<div class="main mt-5 pt-5">
    <?php
    // Check if the search form was submitted via GET
    if (isset($_GET['submit'])) {
        // Sanitize the search term to prevent SQL injection
        $search = mysqli_real_escape_string($connection, $_GET['search']);
        // Query products based on product description
        $query = "SELECT * FROM products WHERE product_description LIKE '%$search%'";
        $search_query = mysqli_query($connection, $query);
        if (!$search_query) {
            die("Query Failed: " . mysqli_error($connection));
        }
        $count = mysqli_num_rows($search_query);
        if ($count == 0) {
            echo "<h2 class='text-center my-4'>No result!</h2>";
        } else {
            echo "<div class='container my-4'><div class='row'>";
            while ($row = mysqli_fetch_assoc($search_query)) {
                $product_name        = $row['product_name'];
                $product_image       = $row['product_image'];
                $product_price       = $row['product_price'];
                $product_description = $row['product_description'];
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/<?php echo $product_image; ?>" class="card-img-top" alt="<?php echo $product_name; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product_name; ?></h5>
                            <p class="card-text"><?php echo $product_description; ?></p>
                            <p class="card-text"><strong>Price: $<?php echo $product_price; ?></strong></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            echo "</div></div>";
        }
    } else {
        echo "<h2 class='text-center my-4'>Please enter a search keyword.</h2>";
    }
    ?>
</div>

<?php include "includes/footer.php"; ?>
