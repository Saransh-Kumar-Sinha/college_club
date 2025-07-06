<?php
$servername = "sql313.infinityfree.com";
$username = "if0_39401445";
$password = "Sy3wMrUvIL";  // Make sure this is correct and matches your dashboard
$database = "if0_39401445_finalproj";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
