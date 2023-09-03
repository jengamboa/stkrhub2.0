<?php
include 'connection.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in, e.g., redirect to a login page
    header("Location: login.php");
    exit();
}

// Get the user_id from the SESSION
$user_id = $_SESSION['user_id'];

// Check if the required POST parameters are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['rating_id']) && isset($_POST['rating']) && isset($_POST['comment'])) {
    $order_id = $_POST['order_id'];
    $rating_id = $_POST['rating_id'];
    $new_rating = $_POST['rating'];
    $new_comment = $_POST['comment'];

    // Update the rating and comment in the ratings table
    $updateRatingSQL = "UPDATE ratings SET rating = $new_rating, comment = '$new_comment' WHERE user_id = $user_id AND order_id = $order_id AND rating_id = $rating_id";

    if (mysqli_query($conn, $updateRatingSQL)) {
        // Rating and comment updated successfully
        header("Location: edit_rating_page.php?order_id=$order_id&rating_id=$rating_id&user_id=$user_id&success=1");
        exit();
    } else {
        // Handle the case where the update failed (e.g., show an error message)
        echo "Error updating rating and comment: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the required POST parameters are not set
    echo "Invalid request. Please provide order ID, rating ID, a new rating value, and a new comment.";
}
?>
