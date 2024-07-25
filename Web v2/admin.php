<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Online Learning System</title>
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
        <h2>Admin Panel</h2>
        <h3>Manage Users</h3>
        <!-- Add user management features here -->
        <h3>Manage Courses</h3>
        <!-- Add course management features here -->
    </div>
    <footer>
        &copy; 2024 Online Learning System
    </footer>
</body>
</html>
