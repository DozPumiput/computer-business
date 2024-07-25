<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <h2>Notifications</h2>
    <?php
    include 'config.php';
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['message'] . " <em>at " . $row['created_at'] . "</em></p>";
    }
    ?>
    <a href="index.php">Back to Home</a>
</body>
</html>
