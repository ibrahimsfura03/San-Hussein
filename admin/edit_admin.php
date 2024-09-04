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
    if (isset($_SESSION['admin_id'])) {
        $admin_id = $_SESSION['admin_id'];

        $query = "SELECT * FROM admin_list";
        $select_all_admins = mysqli_query($connection, $query);

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
                            <a href='add_admin.php' class='nav-link'>Add Admin</a>
                        </li>";
                        echo "<li class='nav-item'>
                            <a href='edit_admin.php' class='nav-link active'>Edit Admin</a>
                        </li>";
                    } elseif ($admin_rank == 'pro') {
                        echo " ";
                    }
                }
                ?>
            </ul>

            <hr>

            <table class="table table-hover">
                <thead class="thead-dark text-light">
                    <th>ID</th>
                    <th>NAME</th>
                    <th>RANK</th>
                    <th>SUPERIOR</th>
                    <th>PRO</th>
                    <th>NIN</th>
                    <th>DELETE</th>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_assoc($select_all_admins)) {
                        $admin_id = $row['admin_id'];
                        $admin_name = $row['admin_name'];
                        $admin_rank = $row['admin_rank'];
                        $admin_nin = $row['admin_nin'];

                        echo "<tr>";
                        echo "<td>#$admin_id</td>";
                        echo "<td>$admin_name</td>";
                        echo "<td><span class='badge badge-warning'>$admin_rank</span></td>";
                        echo "<td><a href='edit_admin.php?admin_superior={$admin_id}'>Superio</a></td>";
                        echo "<td><a href='edit_admin.php?admin_pro={$admin_id}'>Pro</a></td>";
                        echo "<td>$admin_nin</td>";
                        echo "<td><a href='edit_admin.php?admin_delete={$admin_id}' class='text-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
<!-- ***************************SUPEROR**************************** -->
                    <?php
                        if(isset($_GET['admin_superior'])){
                            $to_superio_rank_id = $_GET['admin_superior'];

                            $query = "UPDATE admin_list SET admin_rank = 'superior' WHERE admin_id = $to_superio_rank_id";
                            $superior_query = mysqli_query($connection, $query);
                        }
                    ?>


<!-- ***************************PRO**************************** -->
                    <?php
                        if(isset($_GET['admin_pro'])){
                            $to_pro_rank_id = $_GET['admin_pro'];

                            $query = "UPDATE admin_list SET admin_rank = 'pro' WHERE admin_id = $to_pro_rank_id";
                            $pro_query = mysqli_query($connection, $query);
                        }
                    ?>
                    


<!-- ***************************DELETE**************************** -->
                    <?php
                        if(isset($_GET['admin_delete'])){
                            $to_delete_admin = $_GET['admin_delete'];

                            $query = "DELETE FROM admin_list WHERE admin_id = $to_delete_admin";
                            $delete_query = mysqli_query($connection, $query);
                        }
                    ?>
                </tbody>
            </table>
        </div>

    <?php

    }
    ?>
    <!--
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>