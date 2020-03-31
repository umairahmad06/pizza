<?php

// CREATE Database registration if not exists
$servername = "localhost";
$username = "root";
$password = "7262232";
$dbname = "registration";

// Create and check a new connection
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

// Create database registration
$sql = "CREATE DATABASE IF NOT exists $dbname";
if ($conn->query($sql) === TRUE) {
    ;
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

//CREATE NEW TABLE USERS


$create_table_users = "CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";



    $conn_db = new mysqli($servername, $username, $password, $dbname);
    if ($conn_db->query($create_table_users) === TRUE) {
        ;
    } else {
        echo "Error creating table: " . $conn_db->error;
    }
    $conn_db->close();



$create_table_feedback = "CREATE TABLE IF NOT EXISTS `feedback` (
`first_name` varchar(30) NOT NULL,
`last_name` varchar(30) NOT NULL,
`email` varchar(50) NOT NULL,
`feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    
$conn_db = new mysqli($servername, $username, $password, $dbname);
if ($conn_db->query($create_table_feedback) === TRUE) {
    ;
} else {
    echo "Error creating table: " . $conn_db->error;
}
$conn_db->close();

?>