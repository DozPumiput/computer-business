<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h2>Profile</h2>
    <?php
    include 'config.php';
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($username, $email);
    $stmt->fetch();
    $stmt->close();
    ?>
    <p>Username: <?php echo $username; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <a href="edit_profile.php">Edit Profile</a>
    <a href="index.php">Back to Home</a>
</body>
</html>
