<?php
// Connect to the InfinityFree database
$conn = new mysqli(
    "sql313.infinityfree.com", // Hostname
    "if0_39401445",            // Username
    "Sy3wMrUvIL",              // ✅ Your actual password
    "if0_39401445_finalproj"   // Database
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($email) || empty($message)) {
        echo "<p style='color:red;'>Both fields are required.</p>";
        exit;
    }

    $sql = "INSERT INTO messages (email, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $message);

    if ($stmt->execute()) {
        echo "<h3 style='color:green;'>Thanks! Your message has been received.</h3>";
        echo "<a href='index.html'>Back to Home</a>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p style='color:red;'>Invalid Request. Please submit the form from the website.</p>";
}
?>
