<?php
session_start();
$mysqli = new mysqli("localhost", "root", "root", "senior");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (!isset($_SESSION['uid'])) {
    header('Location: login.php');
    exit;
}