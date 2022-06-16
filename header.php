<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ticketoo</title>
        <link rel="shortcut icon" type="x-icon" href="img/top-logo.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Montserrat:wght@100;200;300;400;500;600;700;900&family=Press+Start+2P&family=Staatliches&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        
    </head>
    <body>
        <!--- NavBar --->
        <div class="navbar">
            <a href="index.php"></a>
            <div class="navbar-container">
                <!--- Logo --->
                <div class="logo-container"><h1 class="logo">Ticketoo</h1></div>
                <!--- Menu --->
                <div class="menu-container">
                    <ul class="menu-list">
                        <li class="menu-list-item active"><a href="index.php">Home</a></li>
                        <li class="menu-list-item"><a href="moviesPage.php">Movies</a></li>
                        <li class="menu-list-item">
                        <?php
                            if (isset($_SESSION["useruid"])) {
                                echo "<a href='account.php'>Account</a>";
                                echo "<a href='includes/logout.inc.php'>Log out</a>";
                            }
                            else {
                                echo "<a href='signup.php'>Sign-up</a>";
                                echo "<a href='login.php'>Login</a>";
                            }
                        ?>
                        </li>
                    </ul>
                </div>
                <!--- Log in --->
                <div class="profile-container">
                    <img class="profile-picture" src="img/Profile.jpg" alt="">
                    <div class="profile-text-container">
                        <span class="profile-text">Profile</span>
                    </div>
                    <!-- <div class="toggle">
                        <i class="fa-solid fa-moon toggle-icon"></i>
                        <i class="fa-solid fa-sun-bright toggle-icon"></i>
                        <div class="toggle-ball"></div>
                    </div> -->
                </div>
                
            </div>
        <!--- SideBar --->
        <!-- <div class="sidebar">
            <i class="left-menu-icon fa-solid fa-magnifying-glass"></i>
            <i class="left-menu-icon fa-solid fa-house"></i>
            <i class="left-menu-icon fa-solid fa-user-large"></i>
        </div> -->
        </div>




