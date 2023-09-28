<?php
include 'connection.php';
include 'html/header.html.php';
session_start();

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $event_type = 'logout';
    $insert_query = "INSERT INTO admin_logs (admin_id, event_type) VALUES ('$users_id', '$event_type')";
    mysqli_query($conn, $insert_query);
}
session_unset();
session_destroy();
header("Location: admin_login.php");
exit;
