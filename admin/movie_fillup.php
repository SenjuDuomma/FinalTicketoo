<?php
    include_once 'header.admin.php';
    //require_once '../includes/dbh.inc.php';
    
?>
<div id="Add_Movie" class="tabcontent">
  
    <table>
    <tr>
      <th><h3>Enter Movie Information</h3></th>
    </tr>
    <tr>
      <td>
        <div class="movie_details">
            <form action="add.movie.php" method="get" >
                <label for="poster">Poster:</label>
                <input type="text" id="poster" name="poster" 
                    value="<?php if (isset($_GET["error"])) {
                    if ($_GET["error"] == "none") {
                        echo $_GET['filename'];}}?>" placeholder="upload image first"><br><br>


                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="" placeholder="Title"><br><br>

                <label for="duration">Duration (hrs):</label>
                <input type="text" id="duration" name="duration" value="" placeholder="e.g 2.5"><br><br>

                <label for="date_showing">Date showing:</label>
                <input type="date" id="date_showing" name="date_showing" value="" placeholder=""><br><br>

                <label for="end_date">End date:</label>
                <input type="date" id="end_date" name="end_date" value="" placeholder=""><br><br>

                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Pending">Pending</option>
                    <option value="Showing">Showing</option>
                    <option value="Ended">Ended</option>
                </select><br><br>
                
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="" placeholder="Price"><br><br>

                <button type="submit" name="submit">Add Movie</button>
            </form>
        </div>
        <?php 
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
                echo "<p>Fill in all fields!</p>";
            }
            
        }?>

      </td>
      <td>
        <div class="poster_upload">
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="poster_img">Upload movie poster</label><br>
            <input type="file" name="poster_img" id="poster_img">
            <button type="submit" name="submit" onclick="uploadsuccess()">Upload</button>
            </form>
            
        </div>
        </td>
        <td>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfile") {
                echo "<p>No file selected!</p>";}
            elseif ($_GET["error"] == "none") {
            ?>
            <div class="movie_poster">
            <img src="../img/<?php echo $_GET['filename'];?>" alt="<?php echo $_GET['filename']?>" srcset="">
            </div>
            
        <?php
            }
        }
        ?></td>
      
    </tr>
    </table>
    
  
    
  <button onclick="cancelBtn()">Cancel</button>
  
</div>
<?php
    include_once 'footer.admin.php';
?>