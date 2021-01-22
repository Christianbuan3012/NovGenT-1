<?php 
    require 'header.php';
    include 'include/connect.php'; 
?>
    <div class="mainbox">
        <h2>Search results</h2>
        <?php 
$search = $_GET['search'];
$con = mysqli_connect("remotemysql.com", "VzW7WZ8LJO", "XjJpXHTDZA", "VzW7WZ8LJO");
    $sql = "SELECT * FROM entries WHERE MATCH(entryTitle, description) AGAINST ('%" .$search. "%')";
    $run = mysqli_query($con, $sql);
    $foundnum = mysqli_num_rows($run);
    if ($foundnum == 0){
        echo "There are 0 results from your search on ' . $search . ':";
    } else {
        echo "There are $foundnum results from your search on ' . $search . ':";
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
</body>
</html>
