<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile - Star Wars Fan Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>User Profile</h1>
    </header>

    <main>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<div class='profile-container'>";
            echo "<p class='profile-info'><strong>Username:</strong> " . htmlspecialchars($_SESSION['username']) . "</p>";
            echo "<p class='profile-info'><strong>Email:</strong> " . htmlspecialchars($_SESSION['email']) . "</p>";

            $extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $profileImagePath = null;
            foreach ($extensions as $ext) {
                $tempPath = "/starwars_site/profile_images/" . $_SESSION['username'] . '.' . $ext;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $tempPath)) {
                    $profileImagePath = $tempPath;
                    break;
                }
            }

            if ($profileImagePath) {
                echo "<img src='{$profileImagePath}' alt='Profile Image' class='profile-image'><br>";
            } else {
                echo "<p>No profile image found. Please upload an image.</p>";
            }

            echo '<form action="upload_image.php" method="post" enctype="multipart/form-data" class="profile-form">
                    <label for="fileToUpload">Select image to upload:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" required><br>
                    <input type="submit" value="Upload Image" name="submit">
                  </form>';

            // Add a form for updating user information
            echo '<form action="update_profile.php" method="post" class="profile-form">
                    <label for="new-email">Change Email:</label>
                    <input type="email" name="new-email" id="new-email" required><br>
                    <label for="new-password">Change Password:</label>
                    <input type="password" name="new-password" id="new-password" required><br>
                    <input type="submit" value="Update Profile" name="submit">
                  </form>';
            echo "</div>";
        } else {
            echo "<p>Please <a href='login.php'>log in</a> to access your profile.</p>";
        }
        ?>
    </main>

    <footer>
        <a href="index.php">Log out</a>
        <p>&copy; 2023 Star Wars Fan Page</p>
        <p>Made by Sinan</p>
    </footer>
</body>
</html>
