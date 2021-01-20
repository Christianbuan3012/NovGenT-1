
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
    <h2>List of all users in the system</h2>
    <p>Keep in mind that if you delete a user that has created Category or Word Entries, these
    will be deleted as well.</p><br><br>

    <table style="margin-left: auto;margin-right: auto;">
        <div class="list"> 
            <tr>
                <th>User id</th>
                <th>Username</th>
                <th>Type of user</th>
                </tr>

            <?php 
                $sql = "SELECT userId, username, type FROM users WHERE userId > 1;";
                $result = mysqli_query($connection, $sql);
                $checkResult = mysqli_num_rows($result);

                if($checkResult > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row['userId'] . "</td>
                                <td>" . $row["username"] . "</td>
                                <td>" . $row["type"] . "</td>
                                <td> <form method='post'><input type='submit' name='deleteUser' value='Delete user'><input type='hidden' name='userId' value='" . $row['userId'] . "'></form></td>
                            </tr>";
                    }
                }
                if(isset($_GET["deluser"]) == "success") {
                    echo '<p class="successMess">Successfully deleted user!</p>';
                    }
            ?>
        </div>
    </table>


</div>
</body>
</html> 
