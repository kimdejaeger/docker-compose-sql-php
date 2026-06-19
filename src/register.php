<?php
$conn = require_once "partials/dbconnection-kim.php";

$formUsername = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$voornaam = $_POST['Voornaam'] ?? '';
$tussenvoegsel = $_POST['tussenvoegsel'] ?? '';
$achternaam = $_POST['achternaam'] ?? '';
$geboortedatum = $_POST['geboortedatum'] ?? '';
$email = $_POST['email'] ?? '';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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