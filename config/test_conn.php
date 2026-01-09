<?php

// Database parameters
$username = "root";          
$password = "";                
$dbname = "users_manager";  

// Trying to stabilish connection with the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifying connection errors
if ($conn->connect_error) {
    
    die("Failure to stabilish connection with the database '$dbname': " . $conn->connect_error);
}

echo "Connection with the database '$dbname' sucessfuly!   ";


$conn->close();

?>