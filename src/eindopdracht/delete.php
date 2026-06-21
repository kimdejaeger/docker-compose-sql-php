<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit();
}

 $conn = require_once "partials/dbconnection-kim.php";

 $id = $_GET['id'];
 $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
 $stmt->bind_param("i", $id);
 $stmt->execute();
 $stmt->close();

 header("Location: overview.php");
 exit();
