<?php 
    require 'header.php';
    include 'include/dbHandler.php'; 
        
    if(isset($_SESSION['usertype'])){
        if($_SESSION["usertype"] == 'Admin'){

        } else {
            header("Location: index.php");
        }
    }
?>  
<div class="mainbox">
    <h2>List of all entries in the system</h2>
        <table style="margin-left: auto;margin-right: auto;">
            <tr>
                <th>Entry ID</th>
                <th>Entry Title</th>
                <th>Description</th>
                </tr>

            <?php 
                $sql = "SELECT entryId, entryTitle, description FROM entries WHERE entryid > 0;";
                $result = mysqli_query($connection, $sql);
                $checkResult = mysqli_num_rows($result);

                if($checkResult > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>" . $row['entryId'] . "</td>
                        <td>" . $row["entryTitle"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td><form method='post'><input type='submit' name='deleteEntry1' value='Delete Entry'><input type='hidden' name='entryId' value='" . $row['entryId'] . "'></form></td></tr>";
                    }
                }
                if(isset($_GET["delentry1"]) == "success") {
                    echo '<p class="successMess">Successfully deleted entry!</p>';
                    }
            ?>
        </table>
</div>
<footer style="padding-top: 400px;">
    <nav>
            <ul>
                <li style="text-align: center; padding-right: 20px;">©2020-2021 NovGenT Dictionary </li>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a style="font-size: 22px;" href="guidelines.php">NovGenT's Guidelines</a></li>
                <li><a href="https://www.facebook.com/kitsune.christian.12/" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px; padding-right: 30px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html> 
