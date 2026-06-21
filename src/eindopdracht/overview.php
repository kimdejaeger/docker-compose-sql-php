<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit();
}

?>


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
      <th>Voornaam</th>
      <th>Tussenvoegsel</th>
      <th>Achternaam</th>
      <th>Username</th>
      <th>Geboortedatum</th>
      <th>Email</th>
    </tr>
<?php

    $conn = require_once "partials/dbconnection-kim.php";

    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0)
      exit('No rows');

    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td> <a href='update.php?id=" . $row['id'] . "'>" . $row['id'] . "</a></td>";
      echo "<td id='voornaam'>" . $row['voornaam'] . "</td>";
      echo "<td id='tussenvoegsel'>" . $row['tussenvoegsel'] . "</td>";
      echo "<td id='achternaam'>" . $row['achternaam'] . "</td>";
      echo "<td id='username'>" . $row['username'] . "</td>";
      echo "<td id='geboortedatum'>" . $row['geboortedatum'] . "</td>";
      echo "<td id='email'>" . $row['email'] . "</td>";
      echo "<td id='verwijder'>" . "<a href='delete.php?id=" . $row['id'] . "'>Verwijder</a>" . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    $stmt->close();
    ?>
     <button><a href="add_user.html">Voeg persoon toe</a></button>
    
    <button><a href="logout.php">Logout</a></button>
</body>
</html>
