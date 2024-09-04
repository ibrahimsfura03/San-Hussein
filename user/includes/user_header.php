<?php ob_start(); ?>
<?php 
session_start(); 
$user_id = $_SESSION['user_id'];
?>
<?php
include "../includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../css/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/css/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!--********************** Header **********************-->
    <div class="header mb-1">
        <div class="clearfix my-3 mx-2">
            <a href="../index_access.php" class="">
                <div class="float-left">
                    <button class="btn btn-dark"><span class="mdi mdi-home mdi-20px"></span>Home</button>
                </div>
            </a>
            <div class="float-right">
<?php
    // if(isset($_SESSION['user_id'])){
    //     $user_id = $_SESSION['user_id'];
    

    $query = "SELECT * FROM carts WHERE user_cart_id = {$user_id}";
    $select_cart_query = mysqli_query($connection, $query);
    $cart_count = mysqli_num_rows($select_cart_query);

  echo "<a href='./cart.php'><span class='mdi mdi-cart-outline mdi-24px text-dark'><span class='badge badge-warning'>$cart_count</span></span></a>";
?>

                <a href="./notifications.php" class="mx-1"><span class="mdi mdi-bell-outline mdi-24px text-dark"><span class="badge badge-warning"> </span></span></a>
                <a href="../logout.php" class="mx-1"><span class="mdi mdi-logout mdi-24px text-dark"></span>
                </a>
            </div>
        </div>
    </div>