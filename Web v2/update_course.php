<?php
// update_course.php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];

    $stmt = $conn->prepare("UPDATE courses SET course_name = ? WHERE id = ?");
    $stmt->bind_param("si", $course_name, $course_id);

    if ($stmt->execute()) {
        echo "Course updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
