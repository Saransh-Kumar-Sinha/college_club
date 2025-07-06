<?php
// add_achievement.php - live server version

// InfinityFree MySQL connection details
$host = "sql313.infinityfree.com";
$username = "if0_39401445";
$password = "Sy3wMrUvIL";
$database = "if0_39401445_finalproj";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$date = $_POST['date'] ?? '';

// Validate input
if (empty($title) || empty($description) || empty($date)) {
    echo "<script>alert('All fields are required!'); window.location.href='achievements.html';</script>";
    $conn->close();
    exit;
}

// Prepare SQL and insert data
$sql = "INSERT INTO achievements (title, description, date) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $description, $date);

// Execute and give feedback
if ($stmt->execute()) {
    echo "<script>alert('Achievement added successfully!'); window.location.href='achievements.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
