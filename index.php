<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
}

$error = '';
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error = "Invalid username or password";
}

$old_username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <main>

        <?php if($error): ?>
            <p style="color:red; font-size: 1.2rem;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="php/auth.php" class="login-form">
            <h2>Admin Login</h2>
            <input type="text" name="username" placeholder="Username" value="<?php echo $old_username; ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="login-btn" type="submit">Login</button>
        </form>
    </main>

</body>
</html>

