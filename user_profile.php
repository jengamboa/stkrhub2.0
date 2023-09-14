<?php
session_start();
?>

<?php
// Include the connection.php file to access the existing database connection
require_once 'connection.php';
require_once 'html/header.html.php';


// Check if the user is logged in and if the "user_id" is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the "shipping_address" field was submitted in the form
    if (isset($_POST['shipping_address'])) {
        $shipping_address = $_POST['shipping_address'];
    } else {
        $shipping_address = '';
    }

    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if an avatar file is uploaded
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // ... (rest of the avatar upload code)
    }

    // Update the user's profile data in the "users" table, including the avatar path if available
    if (isset($avatar_path)) {
        $update_query = "UPDATE users SET username = '$username', email = '$email', shipping_address = '$shipping_address', avatar = '$avatar_path' WHERE user_id = '$user_id'";
    } else {
        $update_query = "UPDATE users SET username = '$username', email = '$email', shipping_address = '$shipping_address' WHERE user_id = '$user_id'";
    }

    if (mysqli_query($conn, $update_query)) {
        // Profile update successful, redirect back to the user profile page
        header("Location: user_profile.php");
        exit;
    } else {
        // Handle the error if the update fails
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
        exit;
    }
}

// Retrieve the user's profile data
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h2>User Profile</h2>
    <form method="post" action="process_user_profile.php" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <label for="shipping_address">Shipping Address:</label>
        <textarea id="shipping_address" name="shipping_address" rows="5" cols="50"><?php echo isset($user['shipping_address']) ? $user['shipping_address'] : ''; ?></textarea><br>

        <?php
        // Check if the user has an avatar and display it
        if (!empty($user['avatar'])) {
            $avatar_url = $user['avatar'];
            echo '<img src="' . $avatar_url . '" alt="Avatar">';
        }
        ?>

        <label for="avatar">Avatar (Profile Picture):</label>
        <input type="file" id="avatar" name="avatar"><br>

        <input type="submit" value="Update Profile">
    </form>
</body>
</html>
