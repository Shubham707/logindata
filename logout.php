<?php require_once('includes/config_connection.php');
error_reporting(0);
session_start();
unset($_SESSION["username"]);
$_SESSION["username"] = "";
unset($_SESSION["role"]);
$_SESSION["role"] = "";
session_destroy();

echo "<script>window.location.assign('login.php');</script>";

?>
