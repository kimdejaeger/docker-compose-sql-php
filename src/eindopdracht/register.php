<?php
$conn = require_once "partials/dbconnection-kim.php";


$formUsername = htmlspecialchars(trim($_POST["username"])) ?? '';
$password = htmlspecialchars($_POST["password"]) ?? '';
$voornaam = htmlspecialchars(trim($_POST["Voornaam"])) ?? '';
$tussenvoegsel = htmlspecialchars(trim($_POST["tussenvoegsel"])) ?? '';
$achternaam = htmlspecialchars(trim($_POST["achternaam"])) ?? '';
$geboortedatum = htmlspecialchars(trim($_POST["geboortedatum"])) ?? '';
$email = htmlspecialchars(trim($_POST["email"])) ?? '';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Validatie
    if (empty($voornaam)) {
        echo "Voornaam is verplicht.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ongeldig e-mailadres.";
    }


$stmt = $conn->prepare("INSERT INTO users (username, password, voornaam, tussenvoegsel, achternaam, geboortedatum, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $formUsername, $hashedPassword, $voornaam, $tussenvoegsel, $achternaam, $geboortedatum, $email);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    header("Location: login.html");
    exit();
} else {
    echo "Er ging iets mis";
}
?>