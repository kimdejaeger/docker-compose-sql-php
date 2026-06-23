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

    <table>
        <tr>
            <td>Voornaam:</td>
            <td>
                <input type="text" name="voornaam" value="<?php echo $row['voornaam']; ?>">
            </td>
        </tr>

        <tr>
            <td>Tussenvoegsel:</td>
            <td>
                <input type="text" name="tussenvoegsel" value="<?php echo $row['tussenvoegsel']; ?>">
            </td>
        </tr>

        <tr>
            <td>Achternaam:</td>
            <td>
                <input type="text" name="achternaam" value="<?php echo $row['achternaam']; ?>">
            </td>
        </tr>

        <tr>
            <td>Geboortedatum:</td>
            <td>
                <input type="date" name="geboortedatum" value="<?php echo $row['geboortedatum']; ?>">
            </td>
        </tr>

        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" value="<?php echo $row['email']; ?>">
            </td>
        </tr>

        <tr>
            <td>Username:</td>
            <td>
                <input type="text" name="username" value="<?php echo $row['username']; ?>">
            </td>
        </tr>

        <tr>
            <td>Nieuw wachtwoord:</td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: right;">
                <button type="submit">Opslaan</button>
                <button type="button" onclick="window.location.href='overview.php';">
                    Cancel
                </button>
            </td>
        </tr>
    </table>

</form>

</body>