<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    $user = $conn->query("SELECT * FROM users WHERE usersID=".$_SESSION['userid']);
    while ($user_row = $user->fetch_assoc()):
    $reservation = $conn->query("SELECT * FROM reservation WHERE usersID=".$user_row['usersID']);
    ?>
<div class="movie-page" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/bg-5.jpg'); background-size: cover; background-position: center;">
<div class="account-wrapper">
        <div class="left">
            <h1>Profile</h1>
            <img src="img/Profile.jpg" alt="user" width="100">
            <h4><?php echo $user_row['usersName']?></h4><br>
            <p>
                Username: <?php echo $user_row['usersUid']?><br>
                Email: <?php echo $user_row['usersEmail']?>
            </p>
        </div>
        <div class="right">
        <h3>Reservation History</h3>
        <?php while($reserved_row = $reservation->fetch_assoc()){
                $movie_rsrv = $conn->query("SELECT * FROM movies WHERE movieID=".$reserved_row['movieID'])->fetch_array();
        ?>
            <div class="info">
                <div class="info_data">
                    <div class="data">
                        <h4>Reservation ID</h4>
                        <p>
                            <span><?php echo $reserved_row['reservationID']?></span>
                        </p>
                    </div>
                    <div class="data">
                        <h4>Reservation Info</h4>
                        <p>
                            Number of Seats: <span> <?php echo $reserved_row['quantity']?></span><br>
                            Contact Number: <span> <?php echo $reserved_row['contactNum']?></span><br>
                            Date: <span> <?php echo $reserved_row['date']?></span><br>
                            Time: <span> <?php echo $reserved_row['time']?></span><br>
                            Cinema: <span> <?php echo $reserved_row['cinemaID']?></span><br>
                        </p>
                    </div>
                    <div class="data">
                        <h4>Movie</h4>
                        <img src="img/<?php echo $movie_rsrv['cover_img']?>" alt="">
                        <p style="text-align: center; font-size: 15px; ">
                            <b><?php echo $movie_rsrv['title']?></b><br>
                        </p>
                    </div>
                    <div class="data">
                        <h4>Movie Info</h4>
                        <p>
                            Duration: <span> <?php echo $movie_rsrv['duration']?> hrs </span><br>
                            Date Showing: <span> <?php echo $movie_rsrv['date_showing']?> </span><br>
                            End Date: <span> <?php echo $movie_rsrv['end_date']?> </span><br>
                            Price: <span> <?php echo $movie_rsrv['price']?></span><br>
                        </p>
                    </div>
                    <div class="data">
                        <h4>Total Price</h4>
                        <p style="font-weight: bold; font-size: 20px; margin-left: 27px;">P<?php echo $reserved_row['total_price']?></p>
                    </div>
                </div>
            </div>
            <!-- <div class="projects">
                <div class="projects_data">
                    
                </div>
            </div> -->
            <?php  } 
                 ?>
        </div>

    </div>
</div>

    
    

    <?php endwhile;?>