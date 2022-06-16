<?php
//include_once 'header.admin.php';
if (isset($_GET['submit'])) {
    $title = $_GET['title'];
    $duration = $_GET['duration'];
    $date_showing = $_GET['date_showing'];
    $end_date = $_GET['end_date'];
    $price = $_GET['price'];
    $cover_img = $_GET['poster'];

    require_once '../includes/dbh.inc.php';
    require_once 'inc/function.admin.php';

    /*echo "title = ". $title."<br>";
    echo "duration = ". $duration."<br>";
    echo "date showing = ". $date_showing."<br>";
    echo "end date = ". $end_date."<br>";
    echo "price = ". $price."<br>";
    echo "cover img = ". $cover_img."    ";
    //echo '<img src="../img/"'.$cover_img. '>';*/
    if (emptyFields($title, $duration, $date_showing, $end_date, $price, $cover_img) !== false) {
        header("location:../movie_fillup.php?error=emptyfields");
        exit();
    }

    addMovie($title, $duration, $date_showing, $end_date, $price, $cover_img, $conn);


}
else {
    echo "not set";
}


//include_once 'footer.admin.php';