<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    $movie = $conn->query("SELECT * FROM movies where movieID =".$_GET['movie_id'])->fetch_array();
    
?>


<section class = "banner" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/banner-img.jpg'); background-size: cover; background-position: center;">
    <?php
        if (isset($_SESSION["useruid"])) {
        echo "<p>Hello there! ". $_SESSION['useruid']."</p>";    
        //$user = $conn->query("SELECT * FROM users WHERE usersUid =".$_SESSION['userid'])->fetch_array();
    ?>
            <h2>Fill-up Ticket Information</h2>
            <div class = "card-container">
                <div class = "card-img">
                    <img src="img/<?php echo $movie['cover_img']?>" alt="" style="height: 800px;">
                </div>

                <div class = "card-content">
                    <h3><?php echo $movie['title']?></h3>
                    <h5>Showing: <?php echo $movie['date_showing']?> - <?php echo $movie['end_date']?></h5>
                    <h5>Price: P<?php echo $movie['price']?></h5>
                    <h4>Hi! <?php echo $_SESSION['userFullName'];?></h4>

                    <form action="assets/reserve.assets.php" method="POST" autocomplete="on">
                        <div class = "form-row">
                            <!-- <label for="cinema">Cinema:</label> -->
                            <select id="cinema" name="cinema">
                                <option value = "cinema-select">Select Cinema</option>
                                <option value="1">Cinema 1</option>
                                <option value="2">Cinema 2</option>
                                <option value="3">Cinema 3</option>
                                <option value="4">Cinema 4</option>
                            </select>

                            <!-- <label for="time">Time:</label> -->
                            <select id="time" name="time">
                                <option value = "time-select">Select Time</option>
                                <option value="10:00:00">10:00:00 AM</option>
                                <option value="01:00:00">01:00:00 PM</option>
                                <option value="03:00:00">03:00:00 PM</option>
                                <option value="05:00:00">05:00:00 PM</option>
                            </select>
                        </div>

                        <div class = "form-row">
                            <input type="text" id="contactNum"name="contactNum" value="" placeholder="Contact Number...">
                            <input type="text" id="quantity" name="quantity" value="" placeholder="Number of Seats...">
                        </div>

                        <div class = "form-row">
                            <h5>Date:</h5>
                            <input type="date" id="date" name="date" min="<?php echo $movie['date_showing']?>" max="<?php echo $movie['end_date']?>">
                            <input type = "reset">
                        </div>
                        <div class = "form-row">
                            <button type="button" onclick="exitBtn()">Cancel</button>
                            <button class="ticket-button" type="submit" name="Book" value="<?php echo $_GET['movie_id'] ?>">Book</button>
                        </div>
                    </form>
                </div>
                <?php 
                if (isset($_GET["error"]))
                {
                    if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                    }
                elseif ($_GET["error"] == "none") {
                    echo "<p>Ticket has been reserved successfully!</p><br>";
                
                }}?>
            </div>
            <?php 
                 } else{?>
                 <div class="reserve-log">
                 <div class="reserve-desc">
                    <h2>You are not logged in. Log-in first to book a ticket. <button class="log-button" onclick="login()">Log-in</button> </h2><br>
                 </div>
                 <div class="reserve-desc">
                    <h2>Don't have an account? Sign-up now! <button class="log-button" onclick="signup()">Sign-up</button> </h2>
                </div>
                </div>
                <?php }?>
        </section>

<script>
function signup() {
  location.replace("signup.php")
}
function login() {
  location.replace("login.php")
}
function exitBtn() {
  location.replace("index.php")
}
</script>
<?php
    include_once 'footer.php';
?>
