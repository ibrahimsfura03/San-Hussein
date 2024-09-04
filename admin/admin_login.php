<?php include "../includes/db.php"; ?>
<?php ob_start(); ?>

<?php session_start(); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="./css/css/bootstrap.css" />
    <link rel="stylesheet" href="./css/css/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <style>
        /* *{
            border: 1px solid red;
        } */
        .container {
            margin-top: 140px;
        }
    </style>

</head>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $admin_login = mysqli_real_escape_string($connection, $_POST['admin_login']);
        $admin_password = mysqli_real_escape_string($connection, $_POST['admin_password']);

        $query = "SELECT * FROM admin_list WHERE admin_name = '{$admin_login}' OR admin_email = '{$admin_login}' ";
        $select_admin_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_admin_query)) {
            $db_id = $row['admin_id'];
            $db_name = $row['admin_name'];
            $db_email = $row['admin_email'];
            $db_rank = $row['admin_rank'];
            $db_password = $row['admin_password'];

            if ($db_password === $admin_password) {
                $_SESSION['admin_id'] = $db_id;
                $_SESSION['admin_name'] = $db_name;
                $_SESSION['admin_email'] = $db_email;
                $_SESSION['admin_rank'] = $db_rank;
                $_SESSION['admin_password'] = $db_password;

                header("Location: admin_dashboard.php");
            } else {
                $errormsg = '<h4 class="text-danger text-center font-weight-normal">Invalid Logins</h4>';
            }
        }
    }
    ?>
    <!-- $db_name === $admin_name &&  -->

    <div class="container justify-content-center">
        <div class="row mx-auto">
            <div class="col-sm-6 mx-auto">
                <h3 class="text-center">Login to Admin</h3>
                <form action="" method="POST">
                    <?php
                    if (isset($errormsg)) {
                        echo $errormsg;
                    }
                    ?>
                    <div class="form-gorup">
                        <label for="login">Login</label>
                        <input type="text" name="admin_login" class="form-control form-sm" placeholder="username or email">
                    </div>
                    <div class="form-gorup my-3">
                        <label for="login">Password</label>
                        <input type="password" name="admin_password" class="form-control form-sm" placeholder="password">
                    </div>
                    <input type="submit" name="submit" value="Login" class="btn btn-dark btn-block btn-sm my-3">


                    <i class=""><span class="badge badge-warning">!</span>contact your superios for login details</i>
                </form>
            </div>
        </div>
    </div>



</body>


<div class="footer bg-warning"></div>
<script src="./css/js/jquery-3.4.1.min.js"></script>
<script src="./css/js/popper.min.js"></script>
<script src="./css/js/bootstrap.min.js"></script>
</body>

</html>