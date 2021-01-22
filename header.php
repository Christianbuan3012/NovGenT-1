<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovGenT Online Dictionary</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500&family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript">
    window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden";
    });
</script>
</head>
<body>
    <div class="loader">
        <img src="loading.gif" alt="Loading..." />
    </div>
    <header>
        <nav>
            <ul>
                <li><a style="font-size: 25px; font-weight: 900;" href="index.php">NovGenT</a></li>
                <li><a href="index.php">Home</a></li>
                <?php if(!isset($_SESSION['username'])) : ?>
                    <li><a href="newAccount.php">Sign up</a></li>
                <?php endif ?>

                <?php if(isset($_SESSION['username'])) : ?>                                      
                    <li><a href="userProfile.php">Account Settings</a></li>
                    <li><a href="create.php">Create an Entry</a></li>
                <?php endif ?>

                <?php if(isset($_SESSION['usertype'])) : ?>
                    <?php if($_SESSION['usertype'] == 'Admin') : ?>
                    <li><a href="userList.php">Manage Users</a></li>
                    <li><a href="entryList.php">Manage Entries</a></li>                  
                    <?php endif ?>
                <?php endif ?>
            </ul>

            <form action="search.php" method="POST" class="search">
                <input type="search" name="search" id="search" placeholder="Search..." style="width: 400px; padding-top: 20px;">
                <input type="submit" name="searchbutton" value="Search" style="width: 50px; padding-right: 100px; padding-top: 20px;">
            </form>

            <div class="signInOut">
                <?php 
                if(isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "
                    <form action='include/dbHandler.php' method='post'>
                    <input type='submit' name='logout' id='logout' value='Log out'>
                    </form>";
                } else {
                    echo '<form action="include/dbHandler.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required="">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required="">
                    <input type="submit" name="login" id="submit" value="Log in">
                    </form>';
                }
                ?>
            </div>
        </nav>
    </header>
