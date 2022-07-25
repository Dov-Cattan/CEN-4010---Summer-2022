<?php
session_start();
$mysqli = new mysqli("localhost", "root", "root", "senior");
// $mysqli = new mysqli("localhost", "admin123", "@admin123!!", "senior");
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}