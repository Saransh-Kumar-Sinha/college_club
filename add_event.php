<?php
// Only run if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // InfinityFree MySQL connection details
    $conn = new mysqli(
        "sql313.infinityfree.com",   // Host
        "if0_39401445",              // Username
        "Sy3wMrUvIL",                // Password
        "if0_39401445_finalproj"     // Database
    );

    // Check for DB connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form values safely
    $title = $_POST['title'] ?? '';
    $event_date = $_POST['event_date'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validate
    if (empty($title) || empty($event_date) || empty($description)) {
        echo "<p style='color:red;'>All fields are required.</p>";
        $conn->close();
        exit;
    }

    // Prepare SQL and bind values
    $stmt = $conn->prepare("INSERT INTO events (title, event_date, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $event_date, $description);

    // Execute and give feedback
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Event added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    // Cleanup
    $stmt->close();
    $conn->close();
}
?>
