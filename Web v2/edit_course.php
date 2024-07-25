<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
</head>
<body>
    <h2>Edit Course</h2>
    <?php
    include 'config.php';
    $course_id = $_GET['course_id'];
    $stmt = $conn->prepare("SELECT course_name FROM courses WHERE id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $stmt->bind_result($course_name);
    $stmt->fetch();
    $stmt->close();
    ?>
    <form action="update_course.php" method="post">
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" value="<?php echo $course_name; ?>" required>
        <br>
        <button type="submit">Update Course</button>
    </form>
    <a href="manage_courses.php">Back to Manage Courses</a>
</body>
</html>
