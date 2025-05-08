<?php
// Database connection parameters
$servername = "localhost";
$username = "sissarshad_indigotaha"; 
$dbpassword = "indigo999taha"; 
$dbname = "sissarshad_indigo"; 

// Create a new connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>