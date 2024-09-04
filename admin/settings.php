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
            $admin_phone = $row['admin_phone'];
            $admin_password = $row['admin_password'];

    ?>

            <div class="mainBody">
                <section id="settings" class="pt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card px-4">
                                    <h4 class="card-text text-center text-info pt-3">Settings <span class="mdi mdi-cog"></span></h4>
                                    <hr class="">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#accSettings" class="nav-link active" data-toggle="tab">Account Settings</a>
                                        </li>
                                    </ul>
                                    <div class="card my-2">
                                        <?php
                                        if (isset($_POST['save'])) {
                                            $admin_id = mysqli_real_escape_string($connection, $_POST['admin_id']);
                                            $admin_name = mysqli_real_escape_string($connection, $_POST['admin_name']);
                                            $admin_nin = mysqli_real_escape_string($connection, $_POST['admin_nin']);
                                            $admin_email = mysqli_real_escape_string($connection, $_POST['admin_email']);

                                            $admin_image = $_FILES['admin_image']['name'];
                                            $admin_image_tmp = $_FILES['admin_image']['tmp_name'];

                                            if (empty($admin_image)) {
                                                echo "";
                                            } else {
                                                move_uploaded_file($admin_image_tmp, "../image/$admin_image");
                                            }

                                            $admin_phone = mysqli_real_escape_string($connection, $_POST['admin_phone']);
                                            $admin_password = mysqli_real_escape_string($connection, $_POST['admin_password']);



                                            $query = "UPDATE admin_list SET 
                                                admin_name = '{$admin_name}', 
                                                admin_nin = '{$admin_nin}', 
                                                admin_email = '{$admin_email}', 
                                                admin_password = '{$admin_password}', 
                                                admin_image = '{$admin_image}',
                                                admin_phone = '{$admin_phone}'
                                            WHERE admin_id = {$the_admin_id}";
                                            $update_profile_query = mysqli_query($connection, $query);

                                            if (!$update_profile_query) {
                                                die("Query Failed: " . mysqli_error($connection));
                                            } else {
                                                echo "Profile updated successfully!";
                                                // header("Location: userprofile.php");    
                                            }
                                        }
                                        ?>
                                        <form action="settings.php?u_id=<?php echo $the_admin_id; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-4 mx-auto text-center py-3">
                                                    <?php
                                                    echo "<img src='../image/{$admin_image}' alt='Profile Image' class='img img-fluid img-thumbnail rounded-circle' style='width: 150'>";
                                                    ?>
                                                    <h6 class="text-secondary">Change Profile Picture</h6>
                                                    <div class="custom-file mx-auto mb-2" style="width: 220px">
                                                        <label for="profilePic" class="custom-file-label"><?php echo $admin_image; ?></label>
                                                        <input type="file" name="admin_image" class="custom-file-input" id="profilePic">
                                                    </div>
                                                    <div class="mx-3 my-3">
                                                        <iframe width="230" height="150" style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d616.2931896013388!2d11.163510195893421!3d10.2880225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10ffd07ef838d803%3A0xd11f7cc2ec342ffb!2sSan%20Husain%20Supermarket!5e1!3m2!1sen!2sng!4v1724845281688!5m2!1sen!2sng" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe>
                                                    </div>
                                                    <!-- <iframe width="230" height="150" style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d616.2931896013388!2d11.163510195893421!3d10.2880225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10ffd07ef838d803%3A0xd11f7cc2ec342ffb!2sSan%20Husain%20Supermarket!5e1!3m2!1sen!2sng!4v1724845281688!5m2!1sen!2sng" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe> -->

                                                    <!-- <iframe
                                                        src="https://maps.app.goo.gl/FEMKtZQ1uQJDTTru5"
                                                        width="100" height="150" style="border:0;" allowfullscreen="" loading="lazy">
                                                    </iframe> -->
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="text-info font-weight-normal py-2 ml-3">Update Your Account</h4>
                                                    <div class="row">
                                                        <!-- Form fields here -->
                                                        <div class="col-md-6 w-100">
                                                            <div class="form-group">
                                                                <label for="userName" style="width: 100%" class="px-3">
                                                                    Name:
                                                                    <input type="text" name="admin_name" value="<?php echo $admin_name; ?>" class="form-control form-control-sm" placeholder="Enter UserName" style="width: 100%" id="userName">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 w-100">
                                                            <div class="form-group">
                                                                <label for="userName" style="width: 100%" class="px-3">
                                                                    Nin No.:
                                                                    <input type="text" readonly name="admin_nin" value="<?php echo $admin_nin; ?>" class="form-control form-control-sm" placeholder="Enter UserName" style="width: 100%" id="userName">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 w-100">
                                                            <div class="form-group">
                                                                <label for="userName" style="width: 100%" class="px-3">
                                                                    ID:
                                                                    <input type="text" readonly name="admin_id" value="<?php echo "#" . $admin_id; ?>" class="form-control form-control-sm" placeholder="Enter UserName" style="width: 100%" id="userName">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email" style="width: 100%" class="px-3">
                                                                    Email Address:
                                                                    <input type="email" readonly name="admin_email" value="<?php echo $admin_email; ?>" class="form-control form-control-sm" placeholder="Enter Your Email" style="width: 100%" id="email">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phoneNo" style="width: 100%" class="px-3">
                                                                    Phone Number:
                                                                    <input type="tel" name="admin_phone" value="<?php echo $admin_phone; ?>" class="form-control form-control-sm" placeholder="Enter Phone number" style="width: 100%" id="phoneNo">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="password" style="width: 100%" class="px-3">
                                                                    Password:
                                                                    <input type="password" autocomplete="off" name="admin_password" value="<?php echo $admin_password; ?>" class="form-control form-control-sm" placeholder="Enter Password" style="width: 100%" id="password">
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <!-- Add other form fields similarly -->
                                                        <div class="col-md-12">
                                                            <div class="form-group d-flex justify-content-around">
                                                                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                                                <input type="submit" name="save" value="Save Changes" class="btn btn-warning btn-block mx-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

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


</div>


<!--********************** End of Main **********************-->
<div class="footer"></div>
<div class="footer bg-warning"></div>

<?php include "includes/admin_footer.php"; ?>