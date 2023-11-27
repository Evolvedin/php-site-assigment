<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Star Wars Fan Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Sign Up for Star Wars Universe</h1>
    </header>

    <main>
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class="error-message">
                <?php 
                echo htmlspecialchars($_SESSION['error']);
                unset($_SESSION['error']); // Clear the error message from the session
                ?>
            </div>
        <?php endif; ?>

        <form action="process_signup.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div>
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </main>

    <footer>
        <a href="index.php">Back to Home</a>
        <p>&copy; 2023 Star Wars Fan Page</p>
        <p>Made by Sinan</p>
    </footer>
</body>
</html>
