<div class="ticket-container" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/bg-6.jpg'); background-size: cover; background-position: center;">
<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    
    if (isset($_GET["error"]))
    {
     if ($_GET["error"] == "none") {
        echo "<p class = 'success'>Ticket has been reserved successfully!</p><br>"; 
        $reservation = $conn->query("SELECT * FROM reservation where reservationID=".$_GET['reservationID'])->fetch_array();
        $movie_rsrv = $conn->query("SELECT * FROM movies where movieID=".$reservation['movieID'])->fetch_array();
        $user = $conn->query("SELECT * FROM users where usersID=".$reservation['usersID'])->fetch_array();
        
       
?>

    <div class="ticket">
        <div class="ticket-left">
            <div class="ticket-image" style="background: url('img/ticket-img.jpg'); height: 250px; width: 250px; background-size: contain; opacity: 0.85;">
                <p class="admit-one">
                    <span>ADMIT </span>
                    <span>ADMIT </span>
                    <span>ADMIT </span>
                </p>
                <div class="ticket-number">
                    <p>
                        Reservation ID No: <?php echo $reservation['reservationID']?>
                    </p>
                </div>
            </div>
            <div class="ticket-info">
                <p class="date">
                    <span>Cinema: <?php echo $reservation['cinemaID']?></span>
                    <span class="june-29">Ticket Information</span>
                    <span>2022</span>
                </p>
                <div class="show-name">
                    <h1><?php echo $movie_rsrv['title']?></h1>
                    <h2>Price: <?php echo $movie_rsrv['price']?></h2>
                </div>
                <div class="time">
                    <p> <span>Name: </span> <?php echo $user['usersName']?></p>
                    <p> <span>Contact Number: </span> <?php echo $reservation['contactNum']?></p>
                </div>
                <p class="location">
                    <span>Date: <?php echo $reservation['date']?></span>
                    <span class="separator"><i class="fa-regular fa-face-smile"></i></span>
                    <span>Time: <?php echo $reservation['time']?></span>
                </p>

            </div>
        </div>
        <div class="ticket-right">
            <p class="admit-one">
                <span>ADMIT </span>
                <span>ADMIT </span>
                <span>ADMIT </span>
            </p>
            <div class="right-info-container">
                <div class="show-name">
                    <h1><?php echo $movie_rsrv['title']?></h1>
                </div>
                <div class="time">
                    <p> <Span>Number of Seats: </Span><?php echo $reservation['quantity']?></p>
                    <p> <span>Total Price: </span> P<?php echo $reservation['total_price']?></p>
                </div>
                <div class="barcode">
                    <img src="img/logo.jpg" alt="">
                </div>
                <p class="ticket-number">
                    Reservation ID No:
                </p>
                <h2><?php echo $reservation['reservationID']?></h2>
            </div>
        </div>
        <button onclick="exitBtn()" class="button button1">Exit</button><button onclick="historyBtn()" class="button button2">History</button>
    </div>
<?php
        }
    }
?>
<script>
function exitBtn() {
  location.replace("index.php")
}
function historyBtn(){location.replace("account.php")}
</script>
</div>


<?php
    include_once 'footer.php';
?>
