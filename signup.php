<?php
include "includes/header.php";
include "includes/db.php";
?>

<?php
if (isset($_POST['sub'])) {
    $username = mysqli_real_escape_string($connection, $_POST['user_name']);
    $email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $password = mysqli_real_escape_string($connection, $_POST['user_password']);

    if(empty($username) || empty($email) || empty($password)){
        $errmsg = '<h4 class="text-danger text-center font-weight-normal py-n5">Invalid Inputs!</h4>';
    }else{

    $query_check = "SELECT * FROM userslist WHERE user_email = '$email' OR user_name = '$username' ";
    $query_checking = mysqli_query($connection, $query_check);
    
        if(mysqli_num_rows($query_checking) >            0){
            $warnMsg = '<h4 class="text-danger text-center font-weight-normal py-n5">User Already Exist!</h4>';
        }else{
        $query = "INSERT INTO userslist(user_name, user_email, user_password) VALUES ('{$username}',
        '{$email}', '{$password}') ";
        $result  = mysqli_query($connection, $query);
                
        
        if ($result) {
            $successmsg = '<h4 class="text-success text-center font-weight-normal py-n5">Created Successefully!</h4>';
        } else {
            // echo "nooooooooooooooooooooooooooo";
            die("QUERY FAILED" . mysqli_error($connection));
        }
            }
            }
        }
    // if ($username && $password && $email) {
    //     echo "Welcome $username your password is $password";
    // } else {
    //     echo "Invalid User";
    // }
?>



<?php
// echo "mfkmkemn kd kfk kdkf vk kwkvmqevqe";
?>
<div class="">
    <div class="">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="navbar-brand">
                <a href="index.php" class="nav-link text-dark">
                    <h3 class="font-weight-bold"> <i>San-Hussein</i> </h3>
                </a>
            </div>
            <div class="float-lg-right">
                <ul class="navbar-nav ">
                    <li class="nav-item navLinks">
                        <a href="signup.php" class="nav-link text-info font-weight-bold">SignUp</a>
                    </li>
                    <li class="nav-item navLinks">
                        <a href="login.php" class="nav-link text-success font-weight-bold">SignIn</a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php include "includes/navigaton.php"; ?>

    </div>
</div>
<div class="singUpmain">
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <span class="mdi mdi-library mdi-36px"></span> <br>
                        <i>Enter details below to</i> <span class="font-weight-bold">Create account</span>
                    </div>
                    <?php
                    if (isset($successmsg)) {
                        echo $successmsg;
                    }
                    if (isset($errmsg)) {
                        echo $errmsg;
                    }
                    if (isset($warnMsg)) {
                        echo $warnMsg;
                    }
                    ?>
                    <form action="" method="POST" class="mt-3">
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label for="username">Enter Username</label>
                                    <input type="text" name="user_name" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Enter Your Email</label>
                                    <input type="email" name="user_email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Choose Password</label>
                                    <input type="password" name="user_password" class="form-control" placeholder="Password">
                                </div>
                                <button name="sub" class="form-control btn btn-dark btn-sm" type="submit">Submit</button>
                                <!-- <input type="submit" value="SighnUp" class="form-control btn btn-dark btn-sm"> -->
                                <h6 class="font-weight-normal">Alredy have an account <a href="login.php">Login</a></h6>
                                <div class="clearfix mt-3">
                                    <a href=""><button class="btn btn-danger btn-sm">Continue with <i class="mdi mdi-google"></i></button></a>
                                    <a href=""><button class="btn btn-info btn-sm float-right">Continue with <i class="mdi mdi-facebook"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include "includes/footer.php"
?>