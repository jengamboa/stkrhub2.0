<?php

include 'connection.php'; // Make sure to include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['built_game_id']) && isset($_POST['game_id']) && isset($_POST['price'])) {
    $built_game_id = $_POST['built_game_id'];
    $game_id = $_POST['game_id'];
    $price = $_POST['price'];

    // Retrieve the user ID from the session or authentication data
    $user_id = $_SESSION['user_id']; // Replace with your method of retrieving the user ID

    // You can include additional validation and security measures here

    // Insert the data into the cart table
    $insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price, is_active)
                     VALUES ('$user_id', '$game_id', '$built_game_id', NULL, 1, '$price', 1)";

    if (mysqli_query($conn, $insert_query)) {
        // Redirect to the marketplace or cart page after adding to cart
        header('Location: marketplace.php'); // Adjust the URL as needed
        exit();
    } else {
        echo 'Error inserting data into the cart table: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid request or missing parameters.';
}
?>
