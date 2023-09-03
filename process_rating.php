<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $user_id = $_POST['user_id'];
    $order_id = $_POST['order_id']; // Make sure to add the name attribute in your form
    $published_game_id = $_POST['published_game_id']; // Make sure to add the name attribute in your form
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Insert the values into the ratings table
    $query = "INSERT INTO ratings (order_id, published_game_id, rating, comment, user_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iiisi", $order_id, $published_game_id, $rating, $comment, $user_id);

    if (mysqli_stmt_execute($stmt)) {

        // SQL statement to update 'is_rated' to 1 for a specific order ID
        $updateRatedSQL = "UPDATE orders SET is_rated = 1 WHERE order_id = $order_id";

        // Execute the SQL statement to update 'is_rated'
        if (mysqli_query($conn, $updateRatedSQL)) {
            echo "is_rated updated successfully for order ID $order_id.";
        } else {
            echo "Error updating is_rated: " . mysqli_error($conn);
        }

        echo "Rating and comment inserted successfully!";
    } else {
        echo "Error inserting rating and comment: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Invalid request method";
}
?>