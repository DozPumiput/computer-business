<?php
session_start();
if ($_SESSION['role'] != 'teacher') {
    header("Location: index.php");
    exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard - Online Learning System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Teacher Dashboard</h2>
        <!-- Add course management features here -->
    </div>
    <footer>
        &copy; 2024 Online Learning System
    </footer>
</body>
</html>
