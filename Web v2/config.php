<?php
// config.php

// ตั้งค่าการเชื่อมต่อฐานข้อมูล
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_DATABASE', 'online_learning_system');

// สร้างการเชื่อมต่อ
function getDB() {
    $dbConnection = null;
    try {
        $dbConnection = new PDO(
            "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE,
            DB_USERNAME,
            DB_PASSWORD
        );
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Database connection error: " . $e->getMessage();
        exit();
    }
    return $dbConnection;
}

// ตั้งค่าคอนฟิกอื่นๆ (ถ้ามี)
define('SITE_NAME', 'Online Learning System');
define('BASE_URL', 'http://yourwebsite.com/'); // เปลี่ยนเป็น URL ของเว็บไซต์ของคุณ
?>
