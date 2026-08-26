<?php
require_once 'db.php';
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $course = trim($_POST["course"]);
    $age = (int)$_POST["age"];

    $stmt = $conn->prepare("INSERT INTO students (name,email,phone,course,age) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $name, $email, $phone, $course, $age);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student</title><link rel="stylesheet" href="css/style.css"></head>
<body><main class="form-container">
<h2>Add Student</h2>
<form method="POST" id="studentForm">
<input name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input name="phone" placeholder="Phone" required>
<input name="course" placeholder="Course" required>
<input type="number" name="age" placeholder="Age" min="1" max="100" required>
<button class="btn" type="submit">Save Student</button>
<a href="index.php">Back</a>
</form></main>
<script src="js/script.js"></script></body></html>
