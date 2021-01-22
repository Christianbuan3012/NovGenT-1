<?php 
    require 'header.php';
    include 'include/connect.php'; 
?>
    <div class="mainbox">
        <h2>Search results</h2>
        <?php 
            if(isset($_POST['searchbutton'])) {
                $query = $_GET['search']; 
                // gets value sent over search form
                
                $min_length = 1;
                // you can set minimum length of the query if you want
                
                if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
                    
                    $query = htmlspecialchars($query); 
                    // changes characters used in html to their equivalents, for example: < to &gt;
                    
                    $query = mysql_real_escape_string($query);
                    // makes sure nobody uses SQL injection
                    $raw_results = mysql_query("SELECT * FROM entries
                        WHERE (`entryTitle` LIKE '%".$query."%') OR (`topicTitle` LIKE '%".$query."%')") or die(mysql_error());
                    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
                    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
                    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
                    if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following   
                        echo '<p>There are ' . $raw_result . ' results from your search on "' . $query . '":</p>'
                        while($results = mysql_fetch_array($raw_results)){
                        // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                            echo '<h3> Language: ' . $list["topicTitle"] . '</h3>' . 
                        '<h4>' . $list["entryTitle"] . '</h4>' . 
                        '<p>' . $list["description"] . '</p><hr>';
                            // posts results gotten from database(title and text) you can also show id ($results['id'])
                        }
                    }
                    else{ // if there is no matching rows do following
                        echo "No results";
                    }
                }
                else{ // if query length is less than minimum
                    echo "Minimum length is ".$min_length;
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
