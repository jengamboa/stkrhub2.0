<?php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in, e.g., redirect to a login page
    header("Location: login_page.php");
    exit();
}

// Get the user_id from the SESSION
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    echo "Editing Rating for Order ID: $order_id<br>";
    echo "User ID: $user_id";

    // Fetch the primary key (rating_id) where user_id and order_id match
    $fetchRatingIdSQL = "SELECT rating_id, rating, comment FROM ratings WHERE user_id = $user_id AND order_id = $order_id";
    $ratingIdResult = mysqli_query($conn, $fetchRatingIdSQL);

    if ($ratingIdResult) {
        $ratingIdData = mysqli_fetch_assoc($ratingIdResult);
        $rating_id = $ratingIdData['rating_id'];
        $existing_rating = $ratingIdData['rating'];
        $existing_comment = $ratingIdData['comment'];

        // Display the existing rating_id
        echo "<br>Rating ID (Primary Key): $rating_id";

        // Display the existing rating and comment
        echo "<br>Current Rating: $existing_rating";
        echo "<br>Current Comment: $existing_comment";

        // Add an "Edit" button that directs to edit_rating_page.php
        echo "<br><a href='edit_rating_page.php?order_id=$order_id&user_id=$user_id&rating_id=$rating_id'>Edit</a>";
    } else {
        echo "<br>No rating found for this order.";
    }
} else {
    echo "Invalid request. Please provide an order ID.";
}
?>