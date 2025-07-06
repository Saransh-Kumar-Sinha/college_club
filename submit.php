<?php
// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $reason = $_POST['reason'];

    // ✅ Your InfinityFree database credentials
    $servername = "sql313.infinityfree.com";
    $username = "if0_39401445";
    $password = "Sy3wMrUvIL";  // from your screenshot
    $dbname = "if0_39401445_finalproj";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data securely using prepared statements
    $sql = "INSERT INTO members (name, email, reason) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $reason);

    if ($stmt->execute()) {
        echo "<h2>Thank you, <em>$name</em>! Your application has been submitted.</h2>";
        echo "<a href='index.html'>Back to Home</a>";
    } else {
        echo "Error while submitting: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}
?>
