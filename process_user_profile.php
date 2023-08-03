<?php
include 'connection.php';
include 'html/header.html.php';
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $shipping_address = $_POST['shipping_address'];

    // Check if an avatar file is uploaded
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
        $avatar_size = $_FILES['avatar']['size'];
        $avatar_type = $_FILES['avatar']['type'];

        // Specify the path where the avatar file will be stored
        $avatar_folder = 'avatars/';
        $avatar_path = $avatar_folder . $avatar_name;

        // Move the uploaded file to the designated folder
        move_uploaded_file($avatar_tmp_name, $avatar_path);
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
?>
