<?php
// Connect to the InfinityFree MySQL database
$conn = new mysqli(
    "sql313.infinityfree.com", // MySQL Hostname
    "if0_39401445",            // MySQL Username
    "Sy3wMrUvIL",              // MySQL Password
    "if0_39401445_finalproj"   // MySQL Database Name
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch achievements data from the database
$result = $conn->query("SELECT * FROM achievements ORDER BY date DESC");
$achievements = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $achievements[] = $row;
    }
} else {
    // If query fails, return error message
    http_response_code(500);
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    $conn->close();
    exit;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($achievements);

$conn->close();
?>
