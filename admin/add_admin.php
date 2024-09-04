<?php session_start(); ?>
<?php ob_start(); ?>

<?php
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<?php


// $admin_rank = $_SESSION['admin_rank'];

// if ($admin_rank === 'pro') {
//     header("Location: admin.php");
//     // exit();
// } elseif ($admin_rank === 'superior') {
//     header("Location: add_admin.php");
//     // exit();
// }


// if (isset($_SESSION['admin_rank'])) {
//     $admin_rank = $_SESSION['admin_rank'];

//     if($admin_rank == 'pro'){
//      header("Location: admin.php");

//     }elseif($admin_rank == 'superior'){
//         header("Location: add_admin.php");
//     }
// }
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
        $admin_name = mysqli_real_escape_string($connection, $_POST['admin_name']);
        $admin_nin = mysqli_real_escape_string($connection, $_POST['admin_nin']);
        $admin_email = mysqli_real_escape_string($connection, $_POST['admin_email']);
        $admin_phone = mysqli_real_escape_string($connection, $_POST['admin_phone']);
        $admin_rank = mysqli_real_escape_string($connection, $_POST['admin_rank']);
        $admin_password = mysqli_real_escape_string($connection, $_POST['admin_password']);

        if (empty($admin_name) || empty($admin_email) || empty($admin_phone) || empty($admin_password)) {
            $errMsg = "<p class='text-bold text-danger text-center'>All fields are required!</p>";
        } else {

            $query_check = "SELECT * FROM admin_list WHERE admin_name = '$admin_name' OR admin_email = '$admin_email' ";
            $query_checking = mysqli_query($connection, $query_check);

            // while ($row = mysqli_fetch_assoc($query_checking)) {
            //     $admin_name_check = $row['admin_name'];
            //     $admin_nin_check = $row['admin_nin'];
            //     $admin_email_check = $row['admin_email'];
            // if ($admin_name_check == $admin_name || $admin_email_check == $admin_email || $admin_nin_check == $admin_nin) {
            // }

            if (mysqli_num_rows($query_checking) > 0) {
                $wrnMsg = "<p class='text-bold text-danger text-center'>Admin already Exist :(</p>";
            } else {
                $query = "INSERT INTO admin_list (admin_name, admin_nin, admin_email, admin_phone, admin_rank, admin_password) ";
                $query .= "VALUES('{$admin_name}', '{$admin_nin}', '{$admin_email}', '{$admin_phone}', '{$admin_rank}', '{$admin_password}')";
                $insert_admin_query = mysqli_query($connection, $query);

                if (!$insert_admin_query) {
                    $errMsg = "<p class='text-bold text-danger text-center'>Inspect Fields Throughly!</p>" . mysqli_error($connection);
                } else {
                    $successMsg = "<p class='text-bold text-success text-center'>New Admin is created :)</p>" . mysqli_error($connection);
                }
            }
        }
    }


    ?>


    <!--
************************************************************************************************* -->


    <div class="container my-3">

        <ul class="nav nav-tabs">
            <li class="nav-item"><a href='admin.php' class='nav-link'>View All Admins</a>
            </li>
            <?php
            $rank_query = "SELECT * FROM admin_list WHERE admin_id = $admin_id";
            $select_all_admins_rank = mysqli_query($connection, $rank_query);

            while ($row = mysqli_fetch_assoc($select_all_admins_rank)) {
                $admin_rank = $row['admin_rank'];


                if ($admin_rank == 'superior') {
                    echo "<li class='nav-item'>
                            <a href='add_admin.php' class='nav-link active'>Add Admin</a>
                        </li>";
                    echo "<li class='nav-item'>
                            <a href='edit_admin.php' class='nav-link'>Edit Admin</a>
                        </li>";
                } elseif ($admin_rank == 'pro') {
                    echo " ";
                }
            }
            ?>
        </ul>

        <?php
        if (isset($errMsg)) {
            echo $errMsg;
        }
        if (isset($successMsg)) {
            echo $successMsg;
        }
        if (isset($wrnMsg)) {
            echo $wrnMsg;
        }
        ?>

        <hr>


        <form action="add_admin.php" method="POST">
            <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" name="admin_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">NIN NO.</label>
                <input type="number" maxlength="11" minlength="11" name="admin_nin" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="admin_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="rank">Rank</label>
                <select name="admin_rank" class="form-control" id="">
                    <option value="pro">pro</option>
                    <option value="superior">superior</option>
                </select>
                <!-- <input type="text" name="admin_rank" value="pro" class="form-control"> -->
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" maxlength="11" name="admin_phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="admin_password" class="form-control">
            </div>



            <input type="submit" name="create" value="Create Account" class="btn btn-warning btn-block btn-sm">
        </form>


    </div>


    <!--
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>