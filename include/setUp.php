<?php
$server = 'remotemysql.com';
$user = 'YGjvSRRMm7';
$password = 'VLK9ZfZtYJ';
$database = 'YGjvSRRMm7';

// Create connection to localhost
$connect = new mysqli($server, $user, $password);

//Check the connection
if($connect->connect_error) {
    die("Failed to connect: " . $connect->connect_error);
}

//Create the database if it does not exist already
if($connect->select_db($database) === false) {
    $createDB = 'CREATE DATABASE ' . $database;
    $connect->query($createDB); //Create the database
    $connect->select_db($database); //Select it
    makeTables($connect); 
    //Because makeTables is a function, the tables and admin will only be made once
}

//Function for creating the starting tables: 
function makeTables($connect) {
    $usertable = "CREATE TABLE IF NOT EXISTS users (
        userId INT NOT NULL AUTO_INCREMENT,
        pin VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        type VARCHAR(255) NOT NULL DEFAULT 'Author',
        CONSTRAINT primaryKey_user PRIMARY KEY (userId)
        )";
    $connect->query($usertable);

    //Create the one and only admin with hashed password, new users will by default be authors
    $adminPwd = password_hash('Admin123', PASSWORD_DEFAULT);
    $adminPin = password_hash('2021', PASSWORD_DEFAULT)
    $newAdmin = "INSERT INTO users(pin, username, password, type)
                VALUES ('$adminPin', 'Admin','$adminPwd','Admin')";
    $connect->query($newAdmin);

    //Create topics table
    $topicTable = "CREATE TABLE IF NOT EXISTS topic (
        topicId INT NOT NULL AUTO_INCREMENT,
        topicTitle VARCHAR (255) NOT NULL,
        createdBy INT NOT NULL,
        CONSTRAINT primaryKey_topic PRIMARY KEY (topicId),
        CONSTRAINT foreignKey_user FOREIGN KEY (createdBy) REFERENCES users(userId) ON UPDATE CASCADE ON DELETE CASCADE
        );";
    $connect->query($topicTable);
    //Insert dummy topic data only for viewing purposes, created by "admin"
    $topicEntry = "INSERT INTO topic(topicTitle, createdBy) VALUES ('English', 1)";
    $connect->query($topicEntry);
    $topicEntry = "INSERT INTO topic(topicTitle, createdBy) VALUES ('Filipino', 1)";
    $connect->query($topicEntry);
    $topicEntry = "INSERT INTO topic(topicTitle, createdBy) VALUES ('Spanish', 1)";
    $connect->query($topicEntry);

    //Add index to the topic table, as this will be frequently searched
    $indextopic = "ALTER TABLE topic ADD FULLTEXT (topicTitle);";
    $connect->query($indextopic);



    //Create entry table
    $entryTable = "CREATE TABLE IF NOT EXISTS entries (
        entryId INT NOT NULL AUTO_INCREMENT,
        entryTitle VARCHAR(255) NOT NULL,
        description VARCHAR(1000) NOT NULL,
        entryexample VARCHAR(255) NOT NULL,
        dateCreated DATETIME DEFAULT NOW() NOT NULL,
        createdBy INT NOT NULL,
        topicId INT NOT NULL,
        CONSTRAINT primaryKey_entries PRIMARY KEY (entryId),
        CONSTRAINT foreignKey_users FOREIGN KEY (createdBy) REFERENCES users(userId) ON UPDATE CASCADE ON DELETE CASCADE,
        CONSTRAINT foreignKey_topics FOREIGN KEY (topicId) REFERENCES topic(topicId) ON UPDATE CASCADE ON DELETE CASCADE
        );";
    $connect->query($entryTable);

    //Insert dummy entry data only for viewing purposes, created by "admin"
    $date = date('Y-m-d H:i:s');
    $entryEntry = "INSERT INTO entries(entryTitle, description, entryexample, dateCreated, createdBy, topicId) 
                    VALUES ('Brown horses','Brown horses with white dots are the best', 'A big brown horse', '$date', 1, 1)";
    $connect->query($entryEntry);

    //Add index to the entry table, as this will be frequently searched
    $indexEntry = "ALTER TABLE entries ADD FULLTEXT (entryTitle, description, entryexample);";
    $connect->query($indexEntry);

    $Translation = "CREATE TABLE IF NOT EXISTS Translations(
        topicId INT NOT NULL AUTO_INCREMENT,
        translations VARCHAR (255) NOT NULL,
        createdBy INT NOT NULL,
        CONSTRAINT primaryKey_topic PRIMARY KEY (topicId),
        CONSTRAINT foreignKey_userss FOREIGN KEY (createdBy) REFERENCES users(userId) ON UPDATE CASCADE ON DELETE CASCADE
        );";
    $connect->query($Translation);

    $TranslationEntry = "INSERT INTO Translations(translations,createdby) VALUES ('Filipino', 1);";
    $connect->query($TranslationEntry);    

    $indextranslation = "ALTER TABLE Translations ADD FULLTEXT (translations);";
    $connect->query($indextranslation);
}

$connect->close();

?>
