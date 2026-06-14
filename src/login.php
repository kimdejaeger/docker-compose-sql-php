<?php
$conn = require_once "partials/dbconnection-kim.php";
$formUsername = $_POST['name'] ?? '';
$formPassword = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?;");
$stmt->bind_param("ss", $formUsername, $formPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1){
    header("Location: overview.php");
    exit();
} else {
    echo "Username or password are not correct";
}
?>
