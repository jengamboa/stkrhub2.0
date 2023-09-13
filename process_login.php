<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the user from the database by their username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // User authentication successful, set session and redirect to the user's dashboard
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            // Insert login event into the user_logs table
            $user_id = $_SESSION['user_id'];
            $event_type = 'login';
            $insert_query = "INSERT INTO user_logs (user_id, event_type) VALUES ('$user_id', '$event_type')";
            mysqli_query($conn, $insert_query);

            

            header("Location: index.php");
            exit;
        }
    }

    // Handle the error if the login fails
    echo "Invalid username or password.";
    exit;
}
