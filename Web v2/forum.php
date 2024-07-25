<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum - Online Learning System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="forum.php">Forum</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">Logout</a></li>
                <?php if($_SESSION['role'] == 'admin'): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php elseif($_SESSION['role'] == 'teacher'): ?>
                    <li><a href="teacher_dashboard.php">Teacher Dashboard</a></li>
                <?php endif; ?>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="container">
        <h2>Forum</h2>
        <!-- Display forum posts -->
        <div class="forum-posts">
            <?php
            $sql = "SELECT * FROM forum ORDER BY created_at DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='forum-post'>";
                    echo "<h3>User: " . $row['user_id'] . "</h3>";
                    echo "<p>" . $row['message'] . "</p>";
                    echo "<p><small>Posted on: " . $row['created_at'] . "</small></p>";
                    echo "</div>";
                }
            } else {
                echo "No posts available.";
            }
            ?>
        </div>
        <!-- Post new message form -->
        <form action="post_message.php" method="post">
            <textarea name="message" required></textarea>
            <br>
            <button type="submit">Post Message</button>
        </form>
    </div>
    <footer>
        &copy; 2024 Online Learning System
    </footer>
</body>
</html>
