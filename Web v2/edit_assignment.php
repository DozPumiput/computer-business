<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Assignment</title>
</head>
<body>
    <h2>Edit Assignment</h2>
    <?php
    include 'config.php';
    $assignment_id = $_GET['assignment_id'];
    $stmt = $conn->prepare("SELECT assignment_title, due_date, course_id FROM assignments WHERE id = ?");
    $stmt->bind_param("i", $assignment_id);
    $stmt->execute();
    $stmt->bind_result($assignment_title, $due_date, $course_id);
    $stmt->fetch();
    $stmt->close();
    ?>
    <form action="update_assignment.php" method="post">
        <input type="hidden" name="assignment_id" value="<?php echo $assignment_id; ?>">
        <label for="course_id">Course:</label>
        <select id="course_id" name="course_id">
            <?php
            $result = $conn->query("SELECT id, course_name FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'" . ($row['id'] == $course_id ? " selected" : "") . ">" . $row['course_name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="assignment_title">Assignment Title:</label>
        <input type="text" id="assignment_title" name="assignment_title" value="<?php echo $assignment_title; ?>" required>
        <br>
        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" value="<?php echo $due_date; ?>" required>
        <br>
        <button type="submit">Update Assignment</button>
    </form>
    <a href="manage_assignments.php">Back to Manage Assignments</a>
</body>
</html>
