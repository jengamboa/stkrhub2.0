<?php
// process_admin_registration.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the username or email already exists in the admin table
    $query = "SELECT * FROM admins WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Username or email already exists, handle the error (e.g., display an error message)
        echo "Username or email already exists. Please choose another one.";
        exit;
    }

    // Insert the new admin into the "admin_table" table with the current timestamp for created_at
    $insert_query = "INSERT INTO admins (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $insert_query)) {
        header("Location: admin_login.php");
        exit;
    } else {
        // Handle the error if the insertion fails
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        exit;
    }
}
?>
