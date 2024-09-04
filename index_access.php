<?php ob_start(); ?>

<?php
include "includes/header.php";
include "includes/db.php";
?>
<div class="header">
    <div class="fixed-top bg-light">
        <div class="clearfix">
            <div class="float-left">
                <a href="index_access.php" class="nav-link text-dark">
                    <h3 class="font-weight-bold"> <i>San-Hussein</i> </h3>
                    <?php
                    // echo $_SESSION['user_id'];

                    ?>
                </a>
            </div>
            <div class="float-right mt-3">
                <?php
                $query = "SELECT * FROM userslist";
                $select_user_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_user_query)) {
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $user_password = $row['user_password'];
                }
                ?>
                <li class="dropdown" style="list-style-type: none;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php
                        echo $_SESSION['user_name'];
                        ?>

                        <i class="fa fa-user"></i>
                    </a>
                    <a href="#" class="">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $the_user_id = $_SESSION['user_id'];;

                            $query = "SELECT * FROM userslist WHERE user_id = {$the_user_id}";
                            $select_user_query = mysqli_query($connection, $query);

                            if (!$select_user_query) {
                                die("Query Failed: " . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_assoc($select_user_query)) {
                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $user_image = $row['user_image'];

                        ?>
                                <?php
                                echo "<a href='user/userprofile.php'><img src='image/{$user_image}' alt='Profile Image' class='img img-responsive rounded-circle'  width='' style='border: radius 50%; width: 50px; height: 50px; margin-top: -5px; margin-bottom: 5px'></a>";
                                ?>
                        <?php
                            }
                        }
                        ?>
                        <!-- <img src="images/avatar.png" alt="" width="40" class="img img-thumbnail img-responsive rounded-circle"> -->
                    </a>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="user/userprofile.php"><i class="mdi mdi-book"></i> Daschboard</a>
                        </li>
                        <li>
                            <?php
                            echo "<a href='user/view_profile.php?view_profile={$user_id}'><i class='mdi mdi-account'></i> Profile</a>"; ?>
                        </li>
                        <li>
                            <?php
                            echo "<a href='user/settings.php?update_profile={$user_id}' class='navlink'><i class='mdi mdi-cog'></i> Settings</a>"; ?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="mdi mdi-logout"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>

        <?php include "includes/navigaton.php"; ?>
    </div>
    <section class="mapimg bg-info">
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
                    <!-- <img src="images/san.jpg" alt="" width="100%" height="20%" class=""> -->
                    <div class="row mx-2">
                        <div class="col-md-6 my-auto">
                            <img src="images/1679445106041.png" alt="" class="img-fluid" width="450px">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h4 class="font-weight-normal mt-4 text-light">We ship Over <i>800</i> Thousand <br> Products Around Nigeria</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row mx-2">
                        <div class="col-md-6 my-auto">
                            <img src="images/1679445004137.png" alt="" class="img-fluid" width="450px">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h4 class="font-weight-normal mt-4 text-light">We ship Over <i>800</i> Thousand <br> Products Around Nigeria</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row mx-2">
                        <div class="col-md-6 my-auto">
                            <img src="images/1679445084509.png" alt="" class="img-fluid" width="450px">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h4 class="font-weight-normal mt-4 text-light">We ship Over <i>800</i> Thousand <br> Products Around Nigeria</h4>
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
include "includes/footer.php"
?>