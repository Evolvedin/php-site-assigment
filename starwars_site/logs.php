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

        if (isset($_POST['delete'])) {
            $deleteQuery = "DELETE FROM login_logs";
            $conn->query($deleteQuery);
        }

        $query = "SELECT * FROM login_logs ORDER BY timestamp DESC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table>";
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

        <div class="log-actions">
            <form method="post">
                <input type="submit" name="refresh" value="Refresh Logs">
                <input type="submit" name="delete" value="Delete Logs" onclick="return confirm('Are you sure you want to delete all logs?');">
            </form>
            <form action="index.php">
                <input type="submit" value="Back to Home">
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Star Wars Fan Page</p>
        <p>Made by Sinan</p>
    </footer>
</body>
</html>
