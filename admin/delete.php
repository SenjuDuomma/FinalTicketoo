<?php
if (isset($_GET['movie_Delete'])) {
    $movie_id = $_GET['movie_Delete'];
    $movieTitle = $_GET['movieTitle'];

   // echo $movieTitle;

    require_once '../includes/dbh.inc.php';
    require_once 'inc/function.admin.php';

    deleteMovie($movie_id, $movieTitle, $conn);
}

if (isset($_GET['customer_delete'])) {
    $customer_ID = $_GET['customer_delete'];
    $customer_Name = $_GET['Name'];

    //echo "customer id = ".$_GET['customer_delete']."<br>";
    //echo "customer Name = ".$_GET['Name'];

    require_once '../includes/dbh.inc.php';
    require_once 'inc/function.admin.php';

    deleteUser($customer_ID, $customer_Name, $conn);
}