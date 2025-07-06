<?php
// achievements.php

// Sample static achievements list (you can also fetch from database)
$achievements = [
  [
    'title' => 'Winner - National Level Sports Meet',
    'description' => 'Our college cricket team won the gold medal at the National Level Inter-College Sports Meet 2024.',
    'date' => '2024-11-20'
  ],
  [
    'title' => '1st Prize - State Singing Competition',
    'description' => 'Our student, Samridhi Singh, won first place in the State-Level Classical Singing Contest.',
    'date' => '2024-08-14'
  ],
  [
    'title' => '2nd Place - State Drama Competition',
    'description' => 'Our drama club secured 2nd position in the State-Level College Drama Fest 2024.',
    'date' => '2024-10-10'
  ],
  [
    'title' => '2nd Prize - College Coding Challenge',
    'description' => 'Aman Kumar won the 2nd prize in the Annual Intra-College Coding Challenge for his innovative Python project.',
    'date' => '2025-01-25'
  ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Achievements</title>
  <style>
    body {
      padding: 20px;
      font-family: Arial, sans-serif;
     background-color: #e0e0e0;

      color: #003049;
    }

    .achievement {
      background-color: #eae2b7;
      border-left: 5px solid #d62828;
      padding: 15px 20px;
      margin-bottom: 20px;
      border-radius: 5px;
    }

    .achievement h3 {
      margin-bottom: 8px;
      color: #001f2d;
    }

    .achievement p {
      margin-bottom: 5px;
    }

    .achievement .date {
      font-size: 0.9em;
      color: #555;
    }
    h2 {
  text-align: center;
  margin-bottom: 30px;
  color: #d62828;
}

  </style>
</head>
<body>

  <h2>Our College Top Achievements</h2>

  <?php foreach ($achievements as $ach): ?>
    <div class="achievement">
      <h3><?php echo $ach['title']; ?></h3>
      <p><?php echo $ach['description']; ?></p>
      <p class="date"><strong>Date:</strong> <?php echo $ach['date']; ?></p>
    </div>
  <?php endforeach; ?>

</body>
</html>
