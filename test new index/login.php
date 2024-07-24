<?php
session_start();
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "website";
$secretKey = "YOUR_SECRET_KEY";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบและรับค่าจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['g-recaptcha-response'];

    // ตรวจสอบ CAPTCHA
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "กรุณายืนยัน CAPTCHA";
    } else {
        // ตรวจสอบผู้ใช้ในฐานข้อมูล
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header("Location: admin.html");
            } else {
                echo "รหัสผ่านไม่ถูกต้อง";
            }
        } else {
            echo "ไม่พบผู้ใช้";
        }

        $conn->close();
    }
}
?>
