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
        <form action="process_signup.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
            </div>

            <div class="form-group">
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
