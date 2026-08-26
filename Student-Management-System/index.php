<?php
require_once 'db.php';
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header><h1>Student Management System</h1></header>
<main class="container">
    <div class="topbar">
        <input type="text" id="searchInput" placeholder="Search student...">
        <a class="btn" href="add_student.php">+ Add Student</a>
    </div>
    <div class="table-card">
        <table id="studentTable">
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Age</th><th>Actions</th></tr></thead>
            <tbody>
            <?php while($student = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']) ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                    <td><?= htmlspecialchars($student['phone']) ?></td>
                    <td><?= htmlspecialchars($student['course']) ?></td>
                    <td><?= htmlspecialchars($student['age']) ?></td>
                    <td>
                        <a class="edit" href="edit_student.php?id=<?= $student['id'] ?>">Edit</a>
                        <a class="delete" href="delete_student.php?id=<?= $student['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>
<script src="js/script.js"></script>
</body>
</html>
