<?php session_start(); ?>


<?php
$_SESSION['admin_name'] = null;
$_SESSION['admin_email'] = null;
$_SESSION['admin_rank'] = null;
$_SESSION['admin_password'] = null;

header("Location: admin_login.php");
?>