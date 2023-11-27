<?php
session_start();
include 'db.php';

$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : ''; 
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''; 
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$dob = isset($_POST['dob']) ? $conn->real_escape_string($_POST['dob']) : '';

// Check if passwords match
if ($password != $confirm_password) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: signup.php");
    exit;
}

// SQL query to insert the user data with the plaintext password
$sql = "INSERT INTO users (username, password, email, date_of_birth) VALUES ('$username', '$password', '$email', '$dob')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Redirect to the index page on success
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
