<?php
$conn = require_once "partials/dbconnection-kim.php";

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?);");
$formUsername = $_POST['name'];
$formPassword = $_POST['password'];
$stmt->bind_param("ss", $formUsername, $formPassword);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    echo "Gebruiker succesvol aangemaakt";
} else {
    echo "Er ging iets mis";
}

?>


