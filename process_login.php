<?php
include 'db.php';

session_start();

$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// SQL query to check the user
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password === $row['password']) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $row['email']; 

        // Log successful login attempt
        $conn->query("INSERT INTO login_logs (username, success) VALUES ('$username', 1)");
        header("Location: profile.php");
        exit;
    } else {
        // Log failed login attempt
        $conn->query("INSERT INTO login_logs (username, success) VALUES ('$username', 0)");
        header("Location: login.php?message=Incorrect password/username");
        exit;
    }
} else {
    // Log failed login attempt (user not found)
    $conn->query("INSERT INTO login_logs (username, success) VALUES ('$username', 0)");
    header("Location: login.php?message=User not found");
    exit;
}

$conn->close();
?>








