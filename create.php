<?php 
    require 'header.php';
    include 'include/connect.php'; 
    require 'include/dbHandler.php' 
?>
<div class="mainbox">
    <div class="displaycontent">

        <!-------------Left column for creating a new topic------------>
        <div>
            <?php if($_SESSION['usertype'] == 'Admin') : ?>   
            <h2>Create a new language</h2>         
            <form action="create.php" method="post">                
            <label for="nametopic">Name of language:</label><br><br>
            <input type="text" name="namecategory" id="namecategory" placeholder="Filipino/ English..." required=""> <br><br>           
            <input type="submit" name="createtopic" id="createtopic" value="Create language"><br><br>
            </form>
            <?php 
                if(isset($_GET["createtopic"]) == "success") {
                echo '<p class="successMess">Successfully added new language!</p>'; } 

                if(isset($_GET["error"]) == "titlealreadyexist") {
                    echo '<p class="errorMess">This language already exist!</p>'; } 
            ?>   
            <?php endif ?>
        </div>

        <!------------Right column for creating a new entry-------->
        <div>
            <h2>Make a new Word Definition</h2>
            <h4>All the definitions on NovGenT were written by people just like you. Now's your chance to add your own!</h4>
            <h4>Please review NovGenT's content <a href="guidelines.php" style="text-decoration: none;"> guidelines</a> before writing your definition.</h4>
            <?php 
                if(isset($_GET["createentry"]) == "success") {
                    echo '<p class="successMess">Successfully added new entry!</p>'; } 
            ?>
            <!--Form for creating new entry-->
            <form action="create.php" method="post" style="text-align: center;">
            <label for="entrytitle" style="font-weight: bold; font-size: 15px;">Word:</label> <br><br>
            <input type="text" name="entrytitle" id="entrytitle" placeholder="Horses, Cars..." required=""><br><br>

            <label for="content" style="font-weight: bold; font-size: 15px;">Definition:</label><br><br>
            <textarea name="content" id="content" cols="100" rows="5" placeholder="Type your definition here" required=""></textarea><br><br>
            <label for="content1" style="font-weight: bold; font-size: 15px;">Example:</label><br><br>
            <textarea name="content1" id="content1" cols="100" rows="3" required=""></textarea><br><br>

            <label for="topic">Please choose a language for this entry</label> <br><br>
            <select name="topic" id="topic" style="font-size: 14px;border-width: 2px; padding: 9px;background:white;border-style: solid;border-color: black; color: #1DA1F2;font-weight: 900;font-family: 'IBM Plex Sans';border-radius: 5px;" required="">
            <?php include 'include/topicMenu.php'; //The dropdown menu for topics?> 
            </select><br><br> 
            <input type="submit" name="createEntry" id="createEntry" value="Create entry">
            </form>                        
        </div> 
    </div>
</div>
<footer style="padding-top: 15px;">
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
