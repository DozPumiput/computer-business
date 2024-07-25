<?php
// update_assignment.php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assignment_id = $_POST['assignment_id'];
    $course_id = $_POST['course_id'];
    $assignment_title = $_POST['assignment_title'];
    $due_date = $_POST['due_date'];

    $stmt = $conn->prepare("UPDATE assignments SET course_id = ?, assignment_title = ?, due_date = ? WHERE id = ?");
    $stmt->bind_param("issi", $course_id, $assignment_title, $due_date, $assignment_id);

    if ($stmt->execute()) {
        echo "Assignment updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
