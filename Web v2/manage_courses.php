<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Courses</title>
</head>
<body>
    <h2>Manage Courses</h2>
    <form action="create_course.php" method="post">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>
        <br>
        <button type="submit">Create Course</button>
    </form>
    <h3>Existing Courses</h3>
    <ul>
        <?php
        include 'config.php';
        $result = $conn->query("SELECT * FROM courses");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['course_name'] . " - <a href='edit_course.php?course_id=" . $row['id'] . "'>Edit</a></li>";
        }
        ?>
    </ul>
    <a href="admin_dashboard.php">Back to Admin Dashboard</a>
</body>
</html>
