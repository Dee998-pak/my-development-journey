<?php
$host = "localhost";
$user = "root";
$password = "Deepak!@#123";
$database = "student_management";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>