<?php

//Define database variables
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'YGjvSRRMm7');
define('DB_PASSWORD', 'VLK9ZfZtYJ');
define('DB_NAME', 'YGjvSRRMm7');

// Create connection to localhost
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($connection === false) {
    die("Failed to connect: " . mysqli_connect_error());
}

?>
