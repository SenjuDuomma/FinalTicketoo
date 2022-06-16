 <?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    $movies = $conn->query("SELECT * FROM movies");
?>

<div class = "container">
    <div class="content-container">
        <div class="feature-content"
        style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/bg-2.jpg');">
        <img class="featured-title" src="img/f-0.jpg" alt="">
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<p>Hello there! ". $_SESSION["useruid"]."</p>";

            }
            else {
            ?>
            <div class="featured-desc">
                Create an account to book ticket!
                <button class="featured-button" onclick="signup()">Sign-up</button>
            </div>
            <div class="featured-desc">
                Log-in and watch movies all you want!
                <button class="featured-button" onclick="login()">Log-in</button>
            </div>
            <?php
            }
        ?>
        </div class="movie-main" >
        <h1 class="movie-main-title">Ticketoo Cinema Reservation</h1>

        <div class="movie-list-container">
            <h1 class="movie-list-title" >NEW RELEASE</h1>
            <div class="movie-list-wrapper">
                <div class="movie-list">
                    <?php while($row=$movies->fetch_assoc()): ?>
                    <div class="movie-list-item"><form action="reserve.php" method="get">
                        <img class="movie-list-item-img" src="img/<?php echo $row['cover_img']?>" alt="">
                        <span class="movie-list-item-title"><?php echo $row['title']?></span>
                        <p class="movie-list-item-desc">
                            Duration: <?php echo $row['duration']?><br>
                            Date Showing: <?php echo $row['date_showing']?><br>
                            End Date: <?php echo $row['end_date']?><br>
                            Ticket Price: <?php echo $row['price']?><br>
                        </p>
                        <button class="movie-list-item-button" type="submit" name="movie_id" value="<?php echo $row['movieID']?>">Reserve</button></form>
                    </div>
                    <?php endwhile; ?>
                </div>
                <!-- <i class="fa-solid fa-circle-right arrow"></i> -->
            </div>
        </div>
</div>

  <script>
function signup() {
  location.replace("signup.php")
}
function login() {
  location.replace("login.php")
}
</script>
<?php
    include_once 'footer.php';
?>
