<?php ob_start(); ?>

<div class="sidenav bg-info">
    <div class="topnav">
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
                echo "<img src='../image/{$user_image}' alt='Profile Image' class='img img-thumbnail rounded-circle mx-auto mt-3'  width='20px'>";
                ?>
                <!-- <img src="css/avatar.png" alt="Profile image" class="img img-thumbnail rounded-circle mx-auto mt-3" width=""> -->
                <h5 class="text-center font-weight-normal mx-auto mt-3 text-light">
                    <?php
                    echo $_SESSION['user_name'];
                    ?>
                    <span class="badge badge-danger"></span>
                </h5>
                <?php
                // if (isset($_GET['update_profile'])){
                //     $the_user_id = $_GET['update_profile'];

                //     $query = "SELECT FROM users WHERE user_id = {$the_user_id}";
                //     $select_user_query = mysqli_query($connection, $query);
                // }
                ?>
                <?php
                echo "<a href='./view_profile.php?view_profile={$user_id}'>
            <button class='btn btn-warning mx-auto mt-1'>View Profile</button>
        </a>";
                ?>
    </div>
    <!--********************** End of SideNav Head **********************-->
    <hr class="border">
    <div class="navmain mt-n3">
        <ul class="list-group list-group-flush">
            <a href="userprofile.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-book"></span> Dashbord

                </li>
            </a>
            <a href="cart.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-cart-outline"></span> Carts

                </li>
            </a>
            <?php echo "   <a href='./orders.php?order_profile={$user_id}' class='navlink'>

            <li class='navlist list-group-item'>
                <span class='mdi mdi-file'></span>
                Orders
            </li>
            </a>"; ?>
            <a href="transactions.php" class="navlink">
                <li class="navlist list-group-item">
                    <span class="mdi mdi-cash"></span> Transactions

                </li>
            </a>
            <?php echo "   <a href='./notifications.php?order_profile={$user_id}' class='navlink'>

            <li class='navlist list-group-item'>
                <span class='mdi mdi-bell-outline'></span>
                Notifications
            </li>
            </a>"; ?>
            <?php echo "   <a href='./settings.php?update_profile={$user_id}' class='navlink'>

            <li class='navlist list-group-item'>
                <span class='mdi mdi-cog'></span>
                Settings
            </li>
            </a>"; ?>
        </ul>
    </div>
</div>
<!--********************** End of SideNav **********************-->
<div class="container-fluid bg-dark">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">


        <div class="float-right imgprofile">
            <?php
                echo "<a href='../index_access.php'><img src='../image/{$user_image}' alt='Profile Image' class='img img-thumbnail rounded-circle mx-auto mt-3'  style='border: radius 50%; width: 50px; height: 50px; margin-top: -5px; margin-bottom: 5px''></a>";
            ?>
            <?php echo "<a href='./view_profile.php?view_profile={$user_id}'><i class='text-light my-3'> $user_name </i></a>"; ?>
    <?php

            }
        }
    ?>
    <!-- <img src="css/avatar.png" alt="Profile image" class=" img-thumbnail rounded-circle mx-auto mt-3" width="40"> -->
        </div>
        <!-- Toggler/collapsibe Button -->
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#toggleNav">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="toggleNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="userprofile.php" class="nav-link">Dashbord</a>
                </li>
                <li class="nav-itm">
                    <a href="cart.php" class="nav-link">Carts</a>
                </li>
                <li class="nav-item">
                    <?php echo  "<a href='./orders.php?order_profile={$user_id}'  class='nav-link'>Orders</a>"; ?>
                </li>
                <li class="nav-item">
                    <a href="transactions.php" class="nav-link">Transactions</a>
                </li>
                <li class="nav-item">
                    <a href="notifications.php" class="nav-link">Notifications</a>
                </li>
                <div class="clearfix">
                    <?php
                    echo "<li class='nav-item float-left'>
                    <a href='./settings.php?update_profile={$user_id}' class='nav-link'>Settings</a>
                </li>";
                    ?>
                    <div class="float-right">
                        <?php
                        echo "<a href='../logout.php' class='mx-1'><span class='mdi mdi-logout mdi-24px text-light'></span></a>";
                        ?>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
</div>