<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit();
}

$conn = require_once "partials/dbconnection-kim.php";

$id = $_POST['id'];
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$voornaam = $_POST['voornaam'] ?? '';
$tussenvoegsel = $_POST['tussenvoegsel'] ?? '';
$achternaam = $_POST['achternaam'] ?? '';
$geboortedatum = $_POST['geboortedatum'] ?? '';
$email = $_POST['email'] ?? '';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// echo "id: $id";
// echo "username: $username";
// echo "password: $password";
// echo "voornaam: $voornaam";
// echo "tussenvoegsel: $tussenvoegsel";
// echo "achternaam: $achternaam";
// echo "geboortedatum: $geboortedatum";
// echo "email: $email";


$stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, voornaam = ?, tussenvoegsel = ?, achternaam = ?, geboortedatum = ?, email = ? WHERE id = ?");
$stmt->bind_param("sssssssi", $username, $hashedPassword, $voornaam, $tussenvoegsel, $achternaam, $geboortedatum, $email, $id);
// $stmt = $conn->prepare("UPDATE users SET voornaam = 'miel' WHERE id = ?");
// $stmt->bind_param("i", $id);


$stmt->execute();

header("Location: overview.php");
exit();

?>