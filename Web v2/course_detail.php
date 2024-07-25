<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Detail</title>
</head>
<body>
    <?php
    include 'config.php';
    $course_id = $_GET['course_id'];
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();
    ?>
    <h2><?php echo $course['course_name']; ?></h2>
    <p>Details about the course will go here.</p>
    <a href="courses.php">Back to Courses</a>
</body>
</html>
