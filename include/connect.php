<?php

//Define database variables
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'BtwLmu6tTk');
define('DB_PASSWORD', 'QPxRh8dwnl');
define('DB_NAME', 'BtwLmu6tTk');

// Create connection to localhost
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($connection === false) {
    die("Failed to connect: " . mysqli_connect_error());
}

?>
