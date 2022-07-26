<?php
session_start();
$_SESSION['login_admin'] = false;
header("Location:index.php");
?>