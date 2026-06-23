<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit();
}

$conn = require_once "partials/dbconnection-kim.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$formUsername = htmlspecialchars(trim($_POST["username"] ?? ''));
$password = htmlspecialchars($_POST["password"] ?? '');
$voornaam = htmlspecialchars(trim($_POST["voornaam"] ?? ''));
$tussenvoegsel = htmlspecialchars(trim($_POST["tussenvoegsel"] ?? ''));
$achternaam = htmlspecialchars(trim($_POST["achternaam"] ?? ''));
$geboortedatum = htmlspecialchars(trim($_POST["geboortedatum"] ?? ''));
$email = htmlspecialchars(trim($_POST["email"] ?? ''));

$errors = [];

if ($formUsername === '') {
    $errors[] = "Username is verplicht.";
} elseif (strlen($formUsername) < 5 || strlen($formUsername) > 20) {
    $errors[] = "Username moet tussen de 5 en 20 tekens zijn.";
}

if ($password === '') {
    $errors[] = "Password is verplicht.";
} elseif (strlen($password) < 8) {
    $errors[] = "Password moet minimaal 8 tekens bevatten.";
}

if ($voornaam === '') {
    $errors[] = "Voornaam is verplicht.";
} elseif (strlen($voornaam) < 2) {
    $errors[] = "Voornaam moet minimaal 2 tekens bevatten.";
}

if (strlen($tussenvoegsel) > 16) {
    $errors[] = "Tussenvoegsel mag maximaal 16 tekens bevatten.";
}

if (strlen($achternaam) < 2 || strlen($achternaam) > 32) {
    $errors[] = "Achternaam moet tussen de 2 en 32 tekens zijn.";
}

if ($geboortedatum === '') {
    $errors[] = "Geboortedatum is verplicht.";
}

if ($email === '') {
    $errors[] = "Email is verplicht.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Ongeldig e-mailadres.";
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
            header("Location: overview.php");
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
    <title>Add user</title>
    <link rel="stylesheet" href="css/style-kim.css">
  </head>
  <body>
    <div>
    <form action="add_user.php" method="POST">
        <h2>Voeg persoon toe</h2>

        <input
        type="text"
        name="username"
        placeholder="Username"
        minlength="5"
        maxlength="20"
        required
    />
    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password"
        minlength="8"
        required
    />
    <br><br>

    <input
        type="text"
        name="voornaam"
        placeholder="Voornaam"
        minlength="2"
        required
    />
    <br><br>

    <input
        type="text"
        name="tussenvoegsel"
        placeholder="Tussenvoegsel"
        maxlength="16"
    />
    <br><br>

    <input
        type="text"
        name="achternaam"
        placeholder="Achternaam"
        minlength="2"
        maxlength="32"
        required
    />
    <br><br>

    <input
        type="date"
        name="geboortedatum"
        required
    />
    <br><br>

    <input
        type="email"
        name="email"
        placeholder="Email"
        required
    />
    <br><br>

    <button type="submit" class="btn">Voeg persoon toe</button>
    <button onclick="window.location.href='overview.php'; return false;">Cancel</button>

    </form>
    </div>
    <div>
        <?php
        if (!empty($errors)) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . htmlspecialchars($error) . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
    <script>
        // document.querySelectorAll("form").forEach(f => f.noValidate = true);
    </script>
  </body>
</html>