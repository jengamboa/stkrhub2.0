<?php
include 'connection.php';
include 'html/header.html.php';
?>

<?php

session_start();

// Insert logout event into the user_logs table
if (isset($_SESSION['users_id'])) {
    $user_id = $_SESSION['users_id'];
    $event_type = 'logout';
    $insert_query = "INSERT INTO user_logs (users_id, event_type) VALUES ('$users_id', '$event_type')";
    mysqli_query($conn, $insert_query);
}

// Clear the session and redirect to the login page
session_unset();
session_destroy();
header("Location: login_page.php");
exit;
?>
