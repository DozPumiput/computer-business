<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
    <h2>Search Results</h2>
    <?php
    include 'config.php';
    $query = $_GET['query'];
    
    // Search for courses
    $course_stmt = $conn->prepare("SELECT * FROM courses WHERE course_name LIKE ?");
    $search_query = "%" . $query . "%";
    $course_stmt->bind_param("s", $search_query);
    $course_stmt->execute();
    $course_result = $course_stmt->get_result();

    echo "<h3>Courses</h3>";
    while ($row = $course_result->fetch_assoc()) {
        echo "<p><a href='course_detail.php?course_id=" . $row['id'] . "'>" . $row['course_name'] . "</a></p>";
    }

    // Search for forum messages
    $forum_stmt = $conn->prepare("SELECT * FROM forum WHERE message LIKE ?");
    $forum_stmt->bind_param("s", $search_query);
    $forum_stmt->execute();
    $forum_result = $forum_stmt->get_result();

    echo "<h3>Forum Messages</h3>";
    while ($row = $forum_result->fetch_assoc()) {
        echo "<p>" . $row['message'] . " <em>by user_id: " . $row['user_id'] . "</em></p>";
    }

    $course_stmt->close();
    $forum_stmt->close();
    $conn->close();
    ?>
    <a href="index.php">Back to Home</a>
</body>
</html>
