<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Logs - Star Wars Fan Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Login Logs</h1>
    </header>

    <main>
        <?php
        include 'db.php';

        $query = "SELECT * FROM login_logs ORDER BY timestamp DESC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Username</th><th>Success</th><th>Timestamp</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . ($row['success'] ? 'Yes' : 'No') . "</td><td>" . $row['timestamp'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No login attempts found.</p>";
        }
        $conn->close();
        ?>
    </main>

    <footer>
        <a href="index.php">Back to Home</a>
        <p>&copy; 2023 Star Wars Fan Page</p>
        <p>Made by Sinan</p>
    </footer>
</body>
</html>
