<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>

<?php
if (isset($_POST['submit'])) {
    $user_login = mysqli_real_escape_string($connection, $_POST['user_login']);
    $password = mysqli_real_escape_string($connection, $_POST['user_password']);

  
    $query = "SELECT * FROM `userslist` WHERE user_email = '{$user_login}' OR user_name = '{$user_login}' ";
    $results = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($results)) {
        $dbid = $row['user_id'];
        $dbname = $row['user_name'];
        $dbemail = $row['user_email'];
        $dbpassword = $row['user_password'];


        if ($dbemail === $user_login  || $dbname === $user_login && $dbpassword === $password) {
            $_SESSION['user_id'] = $dbid;
            $_SESSION['user_name'] = $dbname;
            $_SESSION['user_email'] = $dbemail;
            $_SESSION['user_password'] = $dbpassword;

            header("Location: index_access.php");

        } else {
            $errormsg = '<h4 class="text-danger text-center font-weight-normal">Invalid Logins</h4>';
        }
        }

    // if ($username && $password && $email) {
    //     echo "Welcome $username your password is $password";
    // } else {
    //     echo "Invalid User";
    // }
}
?>



<?php
// echo "jfomefomefm3 n2dno"
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
    <div class="singUpmain">
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <span class="mdi mdi-library mdi-36px"></span> <br>
                            <i>Enter details below to</i> <span class="font-weight-bold">Login</span>
                        </div>
                        <?php
                        if (isset($errormsg)) {
                            echo $errormsg;
                        }
                        ?>
                        <form action="" method="POST" class="mt-3">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="form-group">
                                        <label for="email">Login </label>
                                        <input type="text" name="user_login" class="form-control" placeholder="Username or Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password </label>
                                        <input type="password" name="user_password" class="form-control " placeholder="Password">

                                    </div>
                                    <input type="hidden" name="user_id" value="<?php echo $dbid; ?>">
                                    <button name="submit" class="form-control btn btn-dark btn-sm" type="submit">Submit</button>
                                    <!-- <input type="submit" value="Login" class="form-control btn btn-dark btn-sm"> -->
                                    <h6 class="font-weight-normal">Dont have an account <a href="signup.php">SignUp</a></h6>
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
    <?php include "includes/footer.php" ?>