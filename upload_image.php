<?php
session_start();
if (isset($_SESSION['username'])) {
    // Directory where images will be saved
    $target_dir = "profile_images/";
    // Get file extension
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
    // Create a path for the uploaded image file
    $target_file = $target_dir . $_SESSION['username'] . '.' . $imageFileType;

    // Check if the file is an actual image
    if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) === false) {
        echo "File is not an image.";
        exit;
    }

    // Check file size (e.g., 5MB)
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        exit;
    }

    // Try to upload the file
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    // Redirect to the profile page
    header("Location: profile.php");
    exit;
} else {
    echo "You must be logged in to upload images.";
}
?>





