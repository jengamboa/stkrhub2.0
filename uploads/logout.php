<?php
include 'connection.php';
include 'html/header.html.php';
?>

<?php

// Insert logout event into the user_logs table
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $event_type = 'logout';
    $insert_query = "INSERT INTO user_logs (user_id, event_type) VALUES ('$user_id', '$event_type')";
    mysqli_query($conn, $insert_query);
}

// Clear the session and redirect to the login page
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
