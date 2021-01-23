<?php 
include 'header.php'; ?>
    <div class="mainbox">

        <h2>Register an account</h2>
        <p>Please enter your desired username and password:</p>

        <!------Form to register as a new user:--------->
        <form action="include/dbHandler.php" method="post" style="font-weight: 700;">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username"><br><br>
            <label for="pin">PIN (For Password Recovery):</label><br>
            <input type="password" name="pin" id="pin"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"><br><br>
            <label for="password2">Confirm Password:</label><br>
            <input type="password" name="confPassword" id="confPassword"><br>
            <p><a href="guidelines.php" style="text-decoration: none; color: #1DA1F2;">NovGenT's Guidelines</p>
            <input type="submit" name="submit" id="submit" value="Create account">
        </form>

        <?php //Display error messages, values passed from register in dbHandler.php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "passwordnotmatch") {
                    echo '<p class="errorMess">Passwords do not match</p>';
                } elseif($_GET["error"] == "useralreadytaken") {
                    echo '<p class="errorMess">Username already exist. Please choose another one.</p>';
                } elseif($_GET["error"] == "emptyfields") {
                    echo '<p class="errorMess">Please fill in all the fields.</p>';
                } elseif($_GET["error"] == "invalidusername") {
                    echo '<p class="errorMess">Your username can not contain special characters. Only use letters and numbers.</p>';
                } elseif($_GET["error"] == "invalidpin") {
                echo '<p class="errorMess">PIN should be minimum 5 characters and max 16 characters.</p>';
                } elseif($_GET["error"] == "invalidpassword") {
                echo '<p class="errorMess">Password should be minimum 8 characters and max 16 characters.</p>';
                }
            }
        ?>

    </div>
<footer style="padding-top: 400px;">
    <nav>
            <ul>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a style="font-size: 22px;" href="guidelines.php">NovGenT's Guidelines</a></li>
                <li><a href="https://www.facebook.com/kitsune.christian.12/" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html>
