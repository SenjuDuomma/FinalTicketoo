<?php
if (isset($_POST['submit'])) {
    $file=$_FILES['poster_img'];
    print_r($file);

    $fileName = basename($_FILES['poster_img']['name']);
    $fileTmpName = $_FILES['poster_img']['tmp_name'];
    $fileSize = $_FILES['poster_img']['size'];
    $fileError = $_FILES['poster_img']['error'];
    $fileType = $_FILES['poster_img']['type'];
    
    $fileExt = explode('.', $fileName);
    print_r($fileExt);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'webp');
    if (empty($fileName)) {
        header("Location: movie_fillup.php?error=emptyfile");
    }else {
        if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../img/';
                $uploadfile = $fileDestination . $fileName;
                move_uploaded_file($_FILES['poster_img']['tmp_name'], $uploadfile);
                header("Location: movie_fillup.php?error=none&filename=".$fileName);
            }else {
                echo "Your file is too large!";
            }
        } else {
            echo "There was an error uploading your file";
        }
    }else {
        echo "Incorrect file type!";
    }
    }

    
}