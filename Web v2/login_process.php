<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบผู้ใช้ในฐานข้อมูล
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("Location: index.php");
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that username.";
}
?>
