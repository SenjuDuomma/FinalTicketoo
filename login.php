<?php
    include_once 'header.php';
?>
<div class="login-container" style="background: linear-gradient(to top, rgb(0,0,0,0.5)50%,rgb(0,0,0,0.5)50%), url(img/bg-3.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <section class="signup-form">
        <h2>Login</h2>
        <div class="signupform-form">
            <form action="includes/login.inc.php" method="POST" autocomplete="on">
                <input type="text" name="uid" placeholder="Username/Email..."><br><br>
                
                <input type="password" name="pwd" placeholder="Password..."><br><br>

                <button type="submit" name="submit">Login</button><br><br>
            </form>
        </div>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect inputs!</p>";
        }
    }
    ?>   
    </section>
</div>
<?php
    include_once 'footer.php';
?>