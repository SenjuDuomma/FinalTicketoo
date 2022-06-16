<?php

if (isset($_POST["submit"])) {
   
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';
   
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location:login.admin.php?error=emptyinput");
        exit();//stops the script from running
    }
    if (notAdmin($username) !== true) {
        header("location:login.admin.php?error=notAdmin");
        exit();
    }

    loginAdmin($conn, $username, $pwd);
}
else {
    header("location:../login.admin.php");
    exit();
}