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
</body>
</html> 
