<?php session_start(); ?>
<?php ob_start(); ?>

<?php
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<?php
include "includes/admin_header.php";
include "../includes/db.php";
?>

<!--********************** Header **********************-->
<?php include "includes/navigation.php"; ?>

<div class="main">
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Explore more on our Blog <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to explore.</a>
    </div>
    <!--********************* Main Notify **********************-->

    <?php
    if (isset($_GET['u_id'])) {
        $the_admin_id = $_GET['u_id'];

        $query = "SELECT * FROM admin_list WHERE admin_id = {$the_admin_id}";
        $select_admin_query = mysqli_query($connection, $query);

        if (!$select_admin_query) {
            die("Query Failed: " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_admin_query)) {
            $admin_id = $row['admin_id'];
            $admin_name = $row['admin_name'];
            $admin_nin = $row['admin_nin'];
            $admin_email = $row['admin_email'];
            $admin_image = $row['admin_image'];
            $admin_rank = $row['admin_rank'];
            $admin_phone = $row['admin_phone'];
            $admin_password = $row['admin_password'];
    ?>

            <div class="mainBody">
                <section id="settings" class="pt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card px-4">
                                    <h4 class="card-text text-center text-info pt-3">Profile <span class="mdi mdi-account"></span></h4>
                                    <hr>

                                    <div class="card my-2">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <div class="">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <div class="profile-img-container text-center p-4">
                                                                <img src="../image/<?php echo $admin_image; ?>"
                                                                    class="rounded-circle img-fluid border"
                                                                    alt="User Image"
                                                                    style="width: 150px; height: 150px;">
                                                                <h5 class="mt-3"><?php echo $admin_name; ?></h5>
                                                                <p class="text-muted"><?php echo $admin_email; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <hr>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Username:</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $admin_name; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Nin No.:</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $admin_nin; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">ID:</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $admin_id; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Rank:</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <span class=" badge badge-warning">

                                                                            <?php echo $admin_rank; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Phone:</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $admin_phone; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Password:</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo str_repeat('*', strlen($admin_password)); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <?php
                                                                    echo "<a href='settings.php?u_id={$admin_id}' class='w-50'>
                                <button class='btn btn-warning btn-block btn-sm'>Edit Profile</button>
                                </a>";
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                        }
                    }
                            ?>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
</div>

<!--********************** End of Main **********************-->
<div class="footer"></div>
<div class="footer bg-warning"></div>

<?php include "includes/admin_footer.php"; ?>