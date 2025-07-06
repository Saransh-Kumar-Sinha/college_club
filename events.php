<?php
// Connect to your InfinityFree MySQL database
$conn = new mysqli(
  "sql313.infinityfree.com",   // MySQL Hostname
  "if0_39401445",              // MySQL Username
  "Sy3wMrUvIL",                // MySQL Password
  "if0_39401445_finalproj"     // MySQL Database Name
);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch events
$result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Events</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eef2f3;
    }
    .event-list {
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }
    .event {
      background: #f9f9f9;
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 5px #ccc;
    }
    .event h3 {
      color: #003049;
      margin-bottom: 8px;
    }
    .event p {
      margin: 5px 0;
    }
  </style>
</head>
<body>

  <div class="event-list">
    <h2 style="text-align:center;">Upcoming Events</h2>

    <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='event'>
                <h3>" . htmlspecialchars($row['title']) . "</h3>
                <p><strong>Date:</strong> " . htmlspecialchars($row['event_date']) . "</p>
                <p>" . nl2br(htmlspecialchars($row['description'])) . "</p>
              </div>";
      }
    } else {
      echo "<p style='text-align:center;'>No events found.</p>";
    }

    $conn->close();
    ?>
  </div>

</body>
</html>
