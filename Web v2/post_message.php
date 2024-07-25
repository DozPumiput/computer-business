<?php
session_start();
include 'db.php';

$message = $_POST['message'];
$user_id = $_SESSION['user_id'];

// เพิ่มข้อความใหม่ในฟอรั่ม
$sql = "INSERT INTO forum (user_id, message) VALUES ('$user_id', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: forum.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
