<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the admin from the admin table by their username
    $query = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);

        if (password_verify($password, $admin['password'])) {
            // Admin authentication successful, set session and redirect to the admin dashboard
            session_start();
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_username'] = $admin['username'];

            // Insert login event into the admin_logs table
            $admin_id = $_SESSION['admin_id'];
            $event_type = 'login';
            $insert_query = "INSERT INTO admin_logs (admin_id, event_type) VALUES ('$admin_id', '$event_type')";
            mysqli_query($conn, $insert_query);

            header("Location: index.php");
            exit;
        }
    }

    // Handle the error if the admin login fails
    echo "Invalid username or password.";
    exit;
}
?>
