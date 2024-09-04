<?php ob_start(); ?>


<?php
// if (!isset($_SESSION['user_name'])) {
//     header("Location: ../login.php");
//     exit();
// }

?>


<?php
include "includes/user_header.php";
include "../includes/db.php";
include "includes/user_navigation.php";
?>
<div class="main">
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 mb-5 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>For advertisements <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to promote your products.</a>
    </div>

    <?php
    if (isset($_GET['view_profile'])) {
        $the_user_id = $_GET['view_profile'];

        $query = "SELECT * FROM userslist WHERE user_id = {$the_user_id}";
        $select_user_query = mysqli_query($connection, $query);

        if (!$select_user_query) {
            die("Query Failed: " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_user_query)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_image = $row['user_image'];
            $user_full_name = $row['user_full_name'];
            $user_phone = $row['user_phone'];
            $user_age = $row['user_age'];
            $user_gender = $row['user_gender'];
            $user_address = $row['user_address'];

    ?>

            <div class="mainBody">
                <section id="settings" class="pt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card px-4">
                                    <h4 class="card-text text-center text-info pt-3">Profile <span class="mdi mdi-account"></span></h4>
                                    <hr class="">

                                    <div class="card my-2">
                                        <?php
                                        // if (isset($_POST['save'])) {
                                        //     $user_id = $_POST['user_id'];
                                        //     $user_name = $_POST['user_name'];
                                        //     $user_email = $_POST['user_email'];
                                        //     $user_password = $_POST['user_password'];

                                        //     $user_image = $_FILES['user_image']['name'];
                                        //     $user_image_tmp = $_FILES['user_image']['tmp_name'];

                                        //     if (empty($user_image)) {
                                        //         $user_image = $row['user_image'];
                                        //     } else {
                                        //         move_uploaded_file($user_image_tmp, "../image/$user_image");
                                        //     }

                                        //     $user_full_name = $_POST['user_full_name'];
                                        //     $user_phone = $_POST['user_phone'];
                                        //     $user_age = $_POST['user_age'];
                                        //     $user_gender = $_POST['user_gender'];

                                        //     $query = "UPDATE userslist SET 
                                        //         user_name = '{$user_name}', 
                                        //         user_email = '{$user_email}', 
                                        //         user_password = '{$user_password}', 
                                        //         user_image = '{$user_image}', 
                                        //         user_full_name = '{$user_full_name}', 
                                        //         user_phone = '{$user_phone}', 
                                        //         user_age = '{$user_age}', 
                                        //         user_gender = '{$user_gender}' 
                                        //     WHERE user_id = {$the_user_id}";
                                        //     $update_profile_query = mysqli_query($connection, $query);

                                        //     if (!$update_profile_query) {
                                        //         die("Query Failed: " . mysqli_error($connection));
                                        //     } else {
                                        //         echo "Profile updated successfully!";
                                        //         // header("Location: userprofile.php");    
                                        //     }
                                        // }
                                        ?>
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <div class="">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <div class="profile-img-container text-center p-4">
                                                                <img src="../image/<?php echo $user_image; ?>" class="rounded-circle img-fluid border" alt="User Image" style="width: 150px; height: 150px;">
                                                                <h5 class="mt-3"><?php echo $user_full_name; ?></h5>
                                                                <p class="text-muted"><?php echo $user_email; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <hr>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Username</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $user_name; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Phone</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $user_phone; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Age</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $user_age; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Gender</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $user_gender; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Address</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo $user_address; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-4">
                                                                        <h6 class="mb-0">Password</h6>
                                                                    </div>
                                                                    <div class="col-sm-8 text-secondary">
                                                                        <?php echo str_repeat('*', strlen($user_password)); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <?php
                                                                    echo "<a href='settings.php?update_profile={$user_id}' class='w-50'>
                                                                        <button class='btn btn-warning btn-block btn-sm'>Edit Profile</button>
                                                                    </a>"; ?>
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
                        </div>
                    </div>
                </section>
            </div>

            <?php include "includes/user_footer.php" ?>
</div>