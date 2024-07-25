<?php
// create_course.php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $teacher_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO courses (course_name, teacher_id) VALUES (?, ?)");
    $stmt->bind_param("si", $course_name, $teacher_id);

    if ($stmt->execute()) {
        echo "Course created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
