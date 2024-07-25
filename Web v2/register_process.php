<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// เพิ่มผู้ใช้ใหม่ในฐานข้อมูล
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New user registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
