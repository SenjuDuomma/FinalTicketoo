<?php

function emptyFields($title, $duration, $date_showing, $end_date, $price, $cover_img){
    $result;

    if (empty($title) || empty($duration) || empty($date_showing) || empty($end_date) || empty($price) || empty($cover_img)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function addMovie($title, $duration, $date_showing, $end_date, $price, $cover_img, $conn){
    $sql = "INSERT INTO movies (title, cover_img, duration, date_showing, end_date, price) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = $conn->stmt_init();//Creating a prepared statements
  
    if (!$stmt = $conn->prepare($sql)) {
      header("location:../movie_fillup.php?error=stmtfailed");
          exit();
    }

    
    $stmt->bind_param("ssssss", $title, $cover_img, $duration, $date_showing, $end_date, $price);//pass data from te user mysqli_stmt_bind_param(prepared statement, data type, actual data submitted by the user)
    $stmt->execute();
    $stmt -> close();
    //echo "<script>alert('".$title." \n Was added successfully');</script>";
    header("location:index.php?error=addedsuccessfully&title=".$title);
    exit();
}

function deleteMovie($movie_id, $movieTitle, $conn){
    $sql = "DELETE FROM movies WHERE movieID=".$movie_id;

    if ($conn->query($sql) === TRUE) {
        header("location:index.php?error=deleteSuccess&title=".$movieTitle);
    
    
    } else {
    echo "Error deleting record: " . $conn->error;
    }
}