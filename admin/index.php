<?php
    include_once 'header.admin.php';
    require_once '../includes/dbh.inc.php';
    $movies = $conn->query("SELECT * FROM movies");
    $customers = $conn->query("SELECT * FROM users WHERE usersID !=".$_SESSION['userid']);
    
?>

<center><h1>TICKETOO ADMIN PANEL</h1></center>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Movies')" id="defaultOpen">Movies</button>
  <button class="tablinks" onclick="openCity(event, 'Customers')">Customers</button>
  <button class="tablinks" onclick="openCity(event, 'Reservations')">Reservations</button>
  <a class="tablinks" href="logout.admin.php">Log-out</a>
</div>

<div id="Movies" class="tabcontent">
  <table>
    <tr>
      <th></th>
      <th>Poster</th>
      <th>Title</th>
      <th>Information</th>
      <th>Status</th>
      <th>Action</th>
      <th>
        <button class="" onclick="addMovie()" type="button">Add</button>
      </th>
    </tr>
    <?php while($row=$movies->fetch_assoc()): ?>
    <tr>
      <td><?php //echo $row['movieID']?></td>
      <td>
      <div class="movie-poster">
        <img src="../img/<?php echo $row['cover_img']?>" alt="">
      </div></td>
      <td><p><?php echo $row['title']?></p></td>
      <td><p>
      Duration: <?php echo $row['duration']?><br>
      Date Showing: <?php echo $row['date_showing']?><br>
      End Date: <?php echo $row['end_date']?><br>
      Price: <?php echo $row['price']?><br>
      </p></td>
      <td></td>
      <td>
        <form action="edit.movie.php" method="get">
        <button type="submit" name="movie_Edit" value="<?php echo $row['movieID']?>">Edit</button></form>
        <form action="delete.movie.php" method="get">
          <input type="hidden" name="movieTitle" value="<?php echo $row['title']?>">
          <button type="submit" name="movie_Delete" value="<?php echo $row['movieID']?>">Delete</button></form>
      </td>
    </tr>
    <?php endwhile; 
    if (isset($_GET["error"])) {

      if ($_GET["error"] == "addedsuccessfully") {
        echo "<script>alert('".$_GET['title']." Was added successfully');</script>";
      }
      if ($_GET["error"] == "deleteSuccess") {
        echo "<script>alert('".$_GET['title']." Was deleted successfully');</script>";
      }}
    ?>
  </table>
  
</div>

<div id="Customers" class="tabcontent">
  <table>
    <tr>
      <th></th>
      <th><h3>Name</h3></th>
      <th><h3>Username</h3></th>
      <th><h3>Email</h3></th>
      <th><h3>Action</h3></th>
    </tr>
    <?php while($row=$customers->fetch_assoc()): ?>
    <tr>
      <td></td>
      <td><?php echo $row['usersName']?></td>
      <td><p><?php echo $row['usersUid']?></p></td>
      <td><p><?php echo $row['usersEmail']?></p></td>
      <td>
        <form action="delete.php" method="get">
          <input type="hidden" name="Name" value="<?php echo $row['usersName']?>">
          <button type="submit" name="movie_Delete" value="<?php echo $row['usersID']?>">Delete</button></form>
      </td>
    </tr>
    <?php endwhile;/* 
    if (isset($_GET["error"])) {

      if ($_GET["error"] == "addedsuccessfully") {
        echo "<script>alert('".$_GET['title']." Was added successfully');</script>";
      }
      if ($_GET["error"] == "deleteSuccess") {
        echo "<script>alert('".$_GET['title']." Was deleted successfully');</script>";
      }}*/
    ?>
  </table> 
</div>

<div id="Reservations" class="tabcontent">
<table>
    <tr>
      
    </tr>
    <?php while($row=$customers->fetch_assoc()): ?>
    <tr>
      <td></td>
      <td><?php echo $row['usersName']?></td>
      <td><p><?php echo $row['usersUid']?></p></td>
      <td><p><?php echo $row['usersEmail']?></p></td>
      <td>
        <form action="delete.php" method="get">
          <input type="hidden" name="Name" value="<?php echo $row['usersName']?>">
          <button type="submit" name="movie_Delete" value="<?php echo $row['usersID']?>">Delete</button></form>
      </td>
    </tr>
    <?php endwhile;/* 
    if (isset($_GET["error"])) {

      if ($_GET["error"] == "addedsuccessfully") {
        echo "<script>alert('".$_GET['title']." Was added successfully');</script>";
      }
      if ($_GET["error"] == "deleteSuccess") {
        echo "<script>alert('".$_GET['title']." Was deleted successfully');</script>";
      }}*/
    ?>
  </table> 
</div>



<?php
    include_once 'footer.admin.php';
?>
