<?php
include "includes/header.php";
include "includes/db.php";
?>
<div class="header">
    <div class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="navbar-brand">
                <a href="index.php" class="nav-link text-dark">
                    <h3 class="font-weight-bold"> <i>San-Hussein</i> </h3>
                </a>
            </div>
            <div class="float-lg-right">
                <ul class="navbar-nav ">
                    <li class="nav-item navLinks">
                        <a href="signup.php" class="nav-link text-info font-weight-bold">SignUp</a>
                    </li>
                    <li class="nav-item navLinks">
                        <a href="login.php" class="nav-link text-success font-weight-bold">SignIn</a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php include "includes/navigaton.php"; ?>


        <?php
            if(isset($_POST['submit'])){
                $search = $_POST['search'];

                $query = "SELECT * FROM products WHERE product_tag LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);

                if(!$search_query){
                    die("Query Failed" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                if($count = 0){
                    echo "<h2>No result!</h2>";
                }else{
                    while($row = mysqli_fetch_assoc($search_query)){
                        $product_name = $row['product_name'];
                        $product_image = $row['product_image'];
                        $product_price = $row['product_price'];
                        $product_quantity = $row['product_quantity'];
                        $product_description = $row['product_description'];
                        
                        ?>

    </div>
    <section class="mapimg bg-info py-5 pt-5">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <!-- <ul class="carousel-indicators mt-5">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul> -->

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row mx-2">
                        <div class="col-md-6 my-auto">
                            <img src="images/1679445106041.png" alt="" class="img-fluid" width="450px">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h4 class="font-weight-normal mt-4">We ship Over <i>800</i> Thousand <br> Products Around Nigeria</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row mx-2">
                        <div class="col-md-6 my-auto">
                            <img src="images/1679445004137.png" alt="" class="img-fluid" width="450px">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h4 class="font-weight-normal mt-4">We ship Over <i>800</i> Thousand <br> Products Around Nigeria</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row mx-2">
                        <div class="col-md-6 my-auto">
                            <img src="images/1679445084509.png" alt="" class="img-fluid" width="450px">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h4 class="font-weight-normal mt-4">We ship Over <i>800</i> Thousand <br> Products Around Nigeria</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

    </section>
</div>
<div class="main">
    <section class="men p-5">
        <h4 class="text-center font-weight-normal mb-4">New Men fashion Design</h4>

        <?php include "includes/product.php"; ?>

    </section>
</div>
<?php
                }
            }
        }
?>
<?php
include "includes/footer.php"
?>