<?php

//Define database variables
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'VzW7WZ8LJO');
define('DB_PASSWORD', 'XjJpXHTDZA');
define('DB_NAME', 'VzW7WZ8LJO');

// Create connection to localhost
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($connection === false) {
    die("Failed to connect: " . mysqli_connect_error());
}

?>
