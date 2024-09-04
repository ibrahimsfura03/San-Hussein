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
                <li class="nav-item"><a href='admin.php' class='nav-link active'>View All Admins</a>
                </li>
               <?php
                    $rank_query = "SELECT * FROM admin_list WHERE admin_id = $admin_id";
                    $select_all_admins_rank = mysqli_query($connection, $rank_query);

                    while ($row = mysqli_fetch_assoc($select_all_admins_rank)) {
                        $admin_rank = $row['admin_rank'];


                        if($admin_rank == 'superior'){
                                echo "<li class='nav-item'>
                            <a href='add_admin.php' class='nav-link'>Add Admin</a>
                        </li>";
                                echo "<li class='nav-item'>
                            <a href='edit_admin.php' class='nav-link'>Edit Admin</a>
                        </li>";
                            }elseif($admin_rank == 'pro') {
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
                    <th>EMAIL</th>
                    <th>IMAGE</th>
                    <th>RANK</th>
                    <th>PHONE</th>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_assoc($select_all_admins)) {
                        $admin_id = $row['admin_id'];
                        $admin_name = $row['admin_name'];
                        $admin_email = $row['admin_email'];
                        $admin_image = $row['admin_image'];
                        $admin_rank = $row['admin_rank'];
                        $admin_phone = $row['admin_phone'];

                        echo "<tr>";
                        echo "<td>#$admin_id</td>";
                        echo "<td>$admin_name</td>";
                        echo "<td>$admin_email</td>";
                        echo "<td><img src='../image/$admin_image' class='' width='30' style='border-radius: none'></td>";
                        echo "<td><span class='badge badge-warning'>$admin_rank</span></td>";
                        echo "<td>$admin_phone</td>";
                        echo "</tr>";
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