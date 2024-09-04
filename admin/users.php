<?php session_start(); ?>
<?php ob_start(); ?>

<?php
if (!isset($_SESSION['admin_name'])) {
    // header("Location: admin_login.php");
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
    $query = "SELECT * FROM userslist";
    $select_users_query = mysqli_query($connection, $query);

    if (!$select_users_query) {
        die("Query Failed") . mysqli_error($connection);
    }
    ?>

    <!--
************************************************************************************************* -->

    <div class="container my-3">
        <table class="table table-striped table-hover">
            <thead class="thead-dark text-light">
                <th>ID</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Delete</th>
            </thead>
            <tbody>


                <?php
                while ($row = mysqli_fetch_assoc($select_users_query)) {
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_full_name = $row['user_full_name'];
                    $user_email = $row['user_email'];
                    $user_address = $row['user_address'];
                    $user_gender = $row['user_gender'];
                    $user_phone = $row['user_phone'];
                    $user_age = $row['user_age'];


                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$user_name</td>";
                    echo "<td>$user_full_name</td>";
                    echo "<td>$user_email</td>";
                    echo "<td>$user_address</td>";
                    echo "<td>$user_gender</td>";
                    echo "<td>$user_phone</td>";
                    echo "<td>$user_age</td>";
                    echo "<td><a href='users.php?delete={$user_id}' class='text-danger'>delete</a></td>";
                    echo "</tr>";
                }
                ?>

                <!-- ********************************DELETE************************************ -->

                <?php
                if (isset($_GET['delete'])) {
                    $delete_user = $_GET['delete'];

                    $query = "DELETE FROM userslist WHERE user_id = $delete_user";
                    $delete_user_query = mysqli_query($connection, $query);

                    // header("Location: users.php");
                }
                ?>


            </tbody>
        </table>
    </div>




    <!--
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<div class="footer"></div>

<div class="footer bg-warning"></div>
<?php include "includes/admin_footer.php" ?>