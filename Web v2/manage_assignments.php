<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Assignments</title>
</head>
<body>
    <h2>Manage Assignments</h2>
    <form action="create_assignment.php" method="post">
        <label for="course_id">Course:</label>
        <select id="course_id" name="course_id">
            <?php
            include 'config.php';
            $result = $conn->query("SELECT id, course_name FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['course_name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="assignment_title">Assignment Title:</label>
        <input type="text" id="assignment_title" name="assignment_title" required>
        <br>
        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" required>
        <br>
        <button type="submit">Create Assignment</button>
    </form>
    <h3>Existing Assignments</h3>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM assignments");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['assignment_title'] . " - Due: " . $row['due_date'] . " - <a href='edit_assignment.php?assignment_id=" . $row['id'] . "'>Edit</a></li>";
        }
        ?>
    </ul>
    <a href="teacher_dashboard.php">Back to Teacher Dashboard</a>
</body>
</html>
