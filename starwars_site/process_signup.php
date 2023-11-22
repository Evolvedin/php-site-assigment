<?php
include 'db.php';

$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : ''; 
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';

// SQL query to insert the user data
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Redirect to the index page on success
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


