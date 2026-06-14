<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style-kim.css">
</head>
<body>
    <table>
    <tr>
      <th>Id</th>
      <th>username</th>
    </tr>
<?php
    $conn = require_once "partials/dbconnection-kim.php";

    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0)
      exit('No rows');

    echo "<table>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td> <a href='details.php?id=" . $row['id'] . "'>" . $row['id'] . "</a></td>";
      echo "<td id='username'>" . $row['username'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    $stmt->close();
    ?>
    
</body>
</html>

