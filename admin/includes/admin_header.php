<!-- <?php session_start(); ?> -->
<?php
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_name = $_SESSION['admin_name'];
    $admin_rank = $_SESSION['admin_rank'];
}
?>

<?php
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_logout.php");
    exit();
}
?>


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
</head>

<body>

    <!--********************** Header **********************-->
    <div class="header mb-1">
        <div class="clearfix my-3 mx-2">
            <div class="float-left">
                <button class="btn btn-dark"><span class="mdi mdi-menu-open mdi-24px"></span>Menu</button>
            </div>
            <div class="float-right">
                <a href="./notifications.php" class="mx-1"><span class="mdi mdi-bell-outline mdi-24px text-dark"><span class="badge badge-warning text-warning ml-n2" style="width: 1px; height: 1px;"> </span></span></a>
                <?php
                echo "<a href='./admin_logout.php' class='mx-1'><span class='mdi mdi-logout mdi-24px text-dark'></span></a>";
                ?>
            </div>
        </div>
    </div>
    <!-- ================================== -->