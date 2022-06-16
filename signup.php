<?php
    include_once 'header.php';
?>
<div class="signup-container" style="background: linear-gradient(to top, rgb(0,0,0,0.5)50%,rgb(0,0,0,0.5)50%), url(img/bg.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signupform-form">
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="name" placeholder="Fullname..."><br>
                <input type="text" name="email" placeholder="Email..."><br>
                <input type="text" name="uid" placeholder="Username..."><br>
                <input type="password" name="pwd" placeholder="Password..."><br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password..."><br>
                <button type="submit" name="submit">Sign-up</button><br><br>
            </form>
        </div>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        }
        elseif ($_GET["error"] == "invalidemail") {
            echo "<p>Incorrect email format!</p>";
        }
        elseif ($_GET["error"] == "unmatchedpassword") {
            echo "<p>Passwords doesn't match!</p>";
        }
        elseif ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again!</p>";
        }
        elseif ($_GET["error"] == "usernametaken") {
            echo "<p>Username/Email already taken, try again!</p>";
        }
        elseif ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";?>

            <div>
            <button onclick="login()">Log-in</button>
            </div>
            
    <?php
        }
    }
    ?>
    
    <script>
        function login() {
        location.replace("login.php")
        }

        </script>
    </section>
   
</div>
<?php
    include_once 'footer.php';
?>