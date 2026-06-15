<?php
$conn = require_once "partials/dbconnection-kim.php";

$formUsername = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $formUsername, $hashedPassword);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    header("Location: login.html");
    exit();
} else {
    echo "Er ging iets mis";
}
?>