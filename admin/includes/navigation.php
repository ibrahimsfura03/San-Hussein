<div class="sidenav bg-info">
    <div class="topnav">
        <?php

        if (isset($_SESSION['admin_id'])) {
            $admin_id = $_SESSION['admin_id'];

            $query = "SELECT * FROM admin_list WHERE admin_id = {$admin_id}";
            $select_admin_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_admin_query)) {
                $admin_name = $row['admin_name'];
                $admin_rank = $row['admin_rank'];
                $admin_image = $row['admin_image'];

                echo "<img src='../image/$admin_image' alt='Profile image' class='img img-thumbnail rounded-circle mx-auto mt-3' width=''>";

        ?>
                <h5 class="text-center font-weight-normal mx-auto mt-3 text-light">
                    <?php
                    echo $admin_name;

                    ?>
                    <span class="badge badge-success"><?php
                                                        echo $admin_rank;
                                                        ?>
                    </span>
                </h5>
                <?php
                echo "<a href='view_profile.php?u_id={$admin_id}' class='btn btn-warning mx-auto mt-1 '>View Profile</a>";


                ?>


    </div>
    <!--********************** End of SideNav Head **********************-->
    <hr class="border">
    <div class="navmain mt-n3">
        <ul class="list-group list-group-flush">
            <a href="admin_dashboard.php" class="navlink">
                <li class="navlist list-group-item active">
                    <span class="mdi mdi-book"></span> Dashbord

                </li>
            </a>
            <a href="./categories.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-table"></span> Categories

                </li>
            </a>
            <a href="./users.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-account-outline"></span>
                    Users

                </li>
            </a>
            <a href="./products.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-cart-outline"></span>
                    Products

                </li>
            </a>
            <a href="./orders.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-sale"></span> Orders

                </li>
            </a>
            <a href="./admin.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-account"></span> Admins

                </li>
            </a>
            <?php
                echo "<a href='settings.php?u_id={$admin_id}' class='navlink'>
                <li class='navlist list-group-item'>
                    <span class='mdi mdi-cog'></span> Settings
                </li>
            </a>";
            ?>

        </ul>
    </div>
</div>







<!--********************** End of SideNav **********************-->
<div class="container-fluid bg-dark">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">


        <div class="float-right imgprofile">
            <?php
                echo "<img src='../image/$admin_image' alt='Profile image' class='img img-thumbnail rounded-circle mx-auto mt-3' style='border: radius 50%; width: 50px; height: 50px; margin-top: -5px; margin-bottom: 5px'>";
                echo "<a href='./view_profile.php?u_id={$admin_id}'><i class='text-light my-3'> $admin_name </i></a>";
            ?>
        </div>


<?php
            }
        }

?>
<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleNav">
    <span class="navbar-toggler-icon "></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="toggleNav">

    <ul class="navbar-nav">
        <li class="nav-item active">
            <a href="admin_dashboard.php" class="nav-link">Dashbord</a>
        </li>
        <li class="nav-itm">
            <a href="./categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
            <a href="./users.php" class="nav-link">Users</a>
        </li>
        <li class="nav-item">
            <a href="./products.php" class="nav-link">Products</a>
        </li>
        <li class="nav-item">
            <a href="./orders.php" class="nav-link">Orders</a>
        </li>
        <li class="nav-item">
            <a href="./admin.php" class="nav-link">Admins</a>
        </li>
        <div class="clearfix">
            <?php
            echo "<li class='nav-item float-left'>
                    <a href='settings.php?u_id={$admin_id}' class='nav-link'>Settings</a>
                </li>";
            ?>
            <div class="float-right">
                <a href="./notifications.php" class="mx-1"><span class="mdi mdi-bell-outline mdi-24px text-light"><span class="badge badge-warning text-warning ml-n2" style="width: 2px; height: 4px;"> </span></span></a>
                <?php
                echo "<a href='./admin_logout.php' class='mx-1'><span class='mdi mdi-logout mdi-24px text-light'></span></a>";
                ?>
            </div>
        </div>
    </ul>
</div>
    </nav>
</div>
<!--********************** Main **********************-->