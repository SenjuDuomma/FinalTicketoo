<?php
if (isset($_GET['movie_Delete'])) {
    $movie_id = $_GET['movie_Delete'];
    $movieTitle = $_GET['movieTitle'];

   // echo $movieTitle;

    require_once '../includes/dbh.inc.php';
    require_once 'inc/function.admin.php';

    deleteMovie($movie_id, $movieTitle, $conn);
}