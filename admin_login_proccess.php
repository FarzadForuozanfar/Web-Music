<?php

    $username = $_POST['username'];
    $password = $_POST['password'];
    session_start();


    if ($username == "farzad" && $password == "12345") 
    {
        $_SESSION['login_admin'] = true;
        header("Location:dashboard.php");
    }
    else
    {
        $_SESSION['login_admin'] = false;
        header("Location:login_admin.php");
    }

?> 