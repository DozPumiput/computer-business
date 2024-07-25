<?php
// create_assignment.php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $assignment_title = $_POST['assignment_title'];
    $due_date = $_POST['due_date'];

    $stmt = $conn->prepare("INSERT INTO assignments (course_id, assignment_title, due_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $course_id, $assignment_title, $due_date);

    if ($stmt->execute()) {
        echo "Assignment created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
