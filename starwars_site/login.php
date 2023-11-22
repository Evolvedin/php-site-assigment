<!DOCTYPE html>
<html>
<head>
    <title>Login - Star Wars Fan Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Login to Star Wars Universe</h1>
    </header>

    <main>
        <form action="process_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>

        <?php if(isset($_GET['message'])): ?>
            <p><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
    </main>

    <footer>
        <a href="index.php">Back to Home</a>
        <p>&copy; 2023 Star Wars Fan Page</p>
        <p>Made by Sinan</p>
    </footer>
</body>
</html>
