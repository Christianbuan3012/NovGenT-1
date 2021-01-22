<?php 
    require 'header.php';
    include 'include/connect.php'; 
?>
    <div class="mainbox">
        <h2>Search results</h2>
        <?php 

$button = $_GET['searchbutton'];
$search = $_GET['search'];
$con = mysqli_connect("remotemysql.com", "VzW7WZ8LJO", "XjJpXHTDZA", "VzW7WZ8LJO");
    $sql = "SELECT * FROM entries WHERE MATCH(entryTitle, description) AGAINST ('%" .$search. "%')";
    $run = mysqli_query($con, $sql);
    $foundnum = mysqli_num_rows($run);
    if ($foundnum == 0){
        echo "There are 0 results from your search on ' . $search . ':";
    } else {
        echo "There are $foundnum results from your search on \"' . $search . '\":";
        $sql  = "SELECT * FROM entries WHERE MATCH(entryTitle, description) AGAINST ('%" .$search. "%')";
        $getquery = mysqli_query($con, $sql);
        while ($runrows = mysqli_fetch_array($getquery)) {
            echo '<h3> Language: ' . $list["topicTitle"] . '</h3>' . 
                 '<h4>' . $list["entryTitle"] . '</h4>' . 
                 '<p>' . $list["description"] . '</p><hr>';
        }
    }
?>
    </div> 
<footer>
    <nav>
            <ul>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a style="font-size: 22px;" href="guidelines.php">NovGenT's Guidelines</a></li>
                <li><a href="www.facebook.com" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html>
