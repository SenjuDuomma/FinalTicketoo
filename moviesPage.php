<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    //$movies = $conn->query("SELECT * FROM movies where '".date('Y-m-d')."' BETWEEN date(date_showing) and date(end_date) order by rand()");
    $movies = $conn->query("SELECT * FROM movies");
?>
<div class="movie-page" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/bg-4.jpg'); background-size: cover; background-position: center;">
    <span class="movie-page-title">NOW SHOWING</span>
</div>
  
<div class="movie-container">
<?php while($row=$movies->fetch_assoc()): ?>
    
        <section id="movies-list">
            <div class="movies-box"><form action="reserve.php" method="get">
                <h2><?php echo $row['title']?></h2>
                    <div class="movies-img">
                        <img src="img/<?php echo $row['cover_img']?>" alt="">
                    </div>
                <p>
                Duration: <?php echo $row['duration']?><br>
                Date Showing: <?php echo $row['date_showing']?><br>
                End Date: <?php echo $row['end_date']?><br>
                Ticket Price: <?php echo $row['price']?><br>
                </p>
      
      <button class="bn62" type="submit" name="movie_id" value="<?php echo $row['movieID']?>">Reserve</button></form>
      
            </div>
        </section>
  <?php endwhile; ?>

  
<?php
    include_once 'footer.php';
?>
