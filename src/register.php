<?php
$conn = require_once "partials/dbconnection-kim.php";
// print_r($_POST);

$stmt = $conn->prepare("SELECT * FROM users;");
// $stmt->bind_param("s", $platform);
$stmt->execute();
$result = $stmt->get_result();
var_dump($result);

?>