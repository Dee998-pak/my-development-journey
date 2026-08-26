<?php
require_once 'db.php';
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
$stmt->bind_param("i", $id); $stmt->execute();
$student = $stmt->get_result()->fetch_assoc();
if (!$student) die("Student not found.");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name=trim($_POST["name"]); $email=trim($_POST["email"]); $phone=trim($_POST["phone"]);
    $course=trim($_POST["course"]); $age=(int)$_POST["age"];
    $stmt=$conn->prepare("UPDATE students SET name=?,email=?,phone=?,course=?,age=? WHERE id=?");
    $stmt->bind_param("ssssii",$name,$email,$phone,$course,$age,$id); $stmt->execute();
    header("Location: index.php"); exit;
}
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student</title><link rel="stylesheet" href="css/style.css"></head>
<body><main class="form-container"><h2>Edit Student</h2>
<form method="POST">
<input name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
<input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
<input name="phone" value="<?= htmlspecialchars($student['phone']) ?>" required>
<input name="course" value="<?= htmlspecialchars($student['course']) ?>" required>
<input type="number" name="age" value="<?= htmlspecialchars($student['age']) ?>" min="1" max="100" required>
<button class="btn" type="submit">Update Student</button>
<a href="index.php">Back</a>
</form></main></body></html>
