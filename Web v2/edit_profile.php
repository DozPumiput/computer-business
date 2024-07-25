<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
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
    <form action="update_profile.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        <br>
        <button type="submit">Update Profile</button>
    </form>
    <a href="profile.php">Back to Profile</a>
</body>
</html>
