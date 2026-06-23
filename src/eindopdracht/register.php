<?php
$conn = require_once "partials/dbconnection-kim.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$formUsername = trim($_POST["username"] ?? '');
$password = $_POST["password"] ?? '';
$voornaam = trim($_POST["Voornaam"] ?? '');
$tussenvoegsel = trim($_POST["tussenvoegsel"] ?? '');
$achternaam = trim($_POST["achternaam"] ?? '');
$geboortedatum = trim($_POST["geboortedatum"] ?? '');
$email = trim($_POST["email"] ?? '');


    if (empty($voornaam)) {
        echo "Voornaam is verplicht.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ongeldig e-mailadres.";
    }

$errors = [];

if (strlen($formUsername) < 5 || strlen($formUsername) > 20) {
    $errors[] = "Gebruikersnaam moet tussen de 5 en 20 tekens zijn.";
}

if (strlen($password) < 8) {
    $errors[] = "Wachtwoord moet minimaal 8 tekens bevatten.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }
}


  if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare(
            "INSERT INTO users 
            (username, password, voornaam, tussenvoegsel, achternaam, geboortedatum, email) 
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "sssssss",
            $formUsername,
            $hashedPassword,
            $voornaam,
            $tussenvoegsel,
            $achternaam,
            $geboortedatum,
            $email
        );

        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            header("Location: login.html");
            exit();
        } else {
            $errors[] = "Er ging iets mis.";
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registreer</title>
  </head>
  <body>
    <div>
      <form action="register.php" method="POST">
        <h2>Registreer</h2>

        <input type="text" name="username" placeholder="Username" required />
        <br />
        <br />
        <input type="password" name="password" placeholder="Password" required />
        <br />
        <br />
        <input type="text" name="Voornaam" placeholder="Voornaam" required />
        <br />
        <br />
        <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel" />
        <br />
        <br />
        <input type="text" name="achternaam" placeholder="Achternaam" required />
        <br />
        <br />
        <input type="date" name="geboortedatum" placeholder="Geboortedatum" required />
        <br />
        <br />
        <input type="email" name="email" placeholder="Email" required />
        <br />
        <br />
        <div>
          <br />
          <button type="submit">Voeg persoon toe</button>
        </div>
      </form>
    </div>
  </body>
</html>