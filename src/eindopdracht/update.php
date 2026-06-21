<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <link rel="stylesheet" href="css/style-kim.css">
</head>

<body>
    <h1>Update user</h1>
    <?php
    $conn = require_once "partials/dbconnection-kim.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0)
      exit('No rows');
    $row = $result->fetch_assoc();
    ?>
<form action="handle_update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Voornaam:
    <input type="text" name="voornaam" value="<?php echo $row['voornaam']; ?>">

     Tussenvoegsel:
    <input type="text" name="tussenvoegsel" value="<?php echo $row['tussenvoegsel']; ?>">

    Achternaam:
    <input type="text" name="achternaam" value="<?php echo $row['achternaam']; ?>">

     Geboortedatum: 
    <input type="date" name="geboortedatum" value="<?php echo $row['geboortedatum']; ?>">

    Email:
    <input type="email" name="email" value="<?php echo $row['email']; ?>">

    Username:
    <input type="text" name="username" value="<?php echo $row['username']; ?>">

    New password:
    <input type="password" name="password" value="">

    <button type="submit">
        Opslaan
    </button>
    <button onclick="window.location.href='overview.php'; return false;">
        Cancel
    </button>
</form>

</body>