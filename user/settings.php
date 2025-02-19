<?php ob_start(); ?>

<?php
// if (!isset($_SESSION['user_id'])) {
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
    if (isset($_GET['update_profile'])) {
        $the_user_id = $_GET['update_profile'];

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
                                            $user_id = $_POST['user_id'];
                                            $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
                                            $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
                                            $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);


                                            $user_image = $_FILES['user_image']['name'];
                                            $user_image_tmp = $_FILES['user_image']['tmp_name'];

                                            if (empty($user_image)) {
                                                $user_image = $row['user_image'];
                                            } else {
                                                move_uploaded_file($user_image_tmp, "../image/$user_image");
                                            }

                                            $user_full_name = mysqli_real_escape_string($connection, $_POST['user_full_name']);
                                            $user_phone = mysqli_real_escape_string($connection, $_POST['user_phone']);
                                            $user_age = mysqli_real_escape_string($connection, $_POST['user_age']);
                                            $user_gender = mysqli_real_escape_string($connection, $_POST['user_gender']);
                                            $user_address = mysqli_real_escape_string($connection, $_POST['user_address']);

                                            $query = "UPDATE userslist SET 
                                                user_name = '{$user_name}', 
                                                user_email = '{$user_email}', 
                                                user_password = '{$user_password}', 
                                                user_image = '{$user_image}', 
                                                user_full_name = '{$user_full_name}', 
                                                user_phone = '{$user_phone}', 
                                                user_age = '{$user_age}', 
                                                user_gender = '{$user_gender}', 
                                                user_address = '{$user_address}'
                                            WHERE user_id = {$the_user_id}";
                                            $update_profile_query = mysqli_query($connection, $query);

                                            if (!$update_profile_query) {
                                                die("Query Failed: " . mysqli_error($connection));
                                            } else {
                                                echo "Profile updated successfully!";
                                                // header("Location: userprofile.php");    
                                            }
                                        }
                                        ?>
                                        <form action="settings.php?update_profile=<?php echo $the_user_id; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-4 mx-auto text-center py-3">
                                                    <?php
                                                    echo "<img src='../image/{$user_image}' alt='Profile Image' class='img img-fluid img-thumbnail rounded-circle' style='width: 150'>";
                                                    ?>
                                                    <h6 class="text-secondary">Change Profile Picture</h6>
                                                    <div class="custom-file mx-auto mb-2" style="width: 220px">
                                                        <label for="profilePic" class="custom-file-label"><?php echo $user_image; ?></label>
                                                        <input type="file" name="user_image" class="custom-file-input" id="profilePic">
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
                                                                    User Name:
                                                                    <input type="text" readonly name="user_name" value="<?php echo $user_name; ?>" class="form-control form-control-sm" placeholder="Enter UserName" style="width: 100%" id="userName">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="fullName" style="width: 100%" class="px-3">
                                                                    Full Name:
                                                                    <input type="text" name="user_full_name" value="<?php echo $user_full_name; ?>" class="form-control form-control-sm" placeholder="Enter Last Name" style="width: 100%" id="lastName">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email" style="width: 100%" class="px-3">
                                                                    Email Address:
                                                                    <input type="email" readonly name="user_email" value="<?php echo $user_email; ?>" class="form-control form-control-sm" placeholder="Enter Your Email" style="width: 100%" id="email">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phoneNo" style="width: 100%" class="px-3">
                                                                    Phone Number:
                                                                    <input type="tel" name="user_phone" value="<?php echo $user_phone; ?>" class="form-control form-control-sm" placeholder="Enter Phone number" style="width: 100%" id="phoneNo">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="password" style="width: 100%" class="px-3">
                                                                    Password:
                                                                    <input type="password" autocomplete="off" name="user_password" value="<?php echo $user_password; ?>" class="form-control form-control-sm" placeholder="Enter Password" style="width: 100%" id="password">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="age" style="width: 100%" class="px-3">
                                                                    Age:
                                                                    <input type="number" name="user_age" value="<?php echo $user_age; ?>" class="form-control form-control-sm" placeholder="Enter Age" style="width: 100%" id="age">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mx-3">
                                                                <label for="gender" class="mr-sm-2">Gender:</label>
                                                                <select name="user_gender" class="custom-select" id="gender" style="width: 90%; justify-items: center;">
                                                                    <option value="<?php echo $user_gender; ?>"><?php echo $user_gender; ?></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mx-3">
                                                                <label for="address" style="width: 100%" class="px-3">
                                                                    Address:
                                                                </label>
                                                                <input type="text" name="user_address" value="<?php echo $user_address; ?>" class="form-control form-control-sm" placeholder="Choose Delivery Address" style="width: 100%" id="address">
                                                            </div>
                                                        </div>

                                                        <!-- Add other form fields similarly -->
                                                        <div class="col-md-12">
                                                            <div class="form-group d-flex justify-content-around">
                                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
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

            <?php include "includes/user_footer.php" ?>
</div>