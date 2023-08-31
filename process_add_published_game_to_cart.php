<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $user_id = $_POST['user_id'];
    $published_game_id = $_POST['published_game_id'];
    $game_price = $_POST['price'];

    // Insert data into the cart table
    $insert_query = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ('$user_id', '$published_game_id', 1, '$game_price')";

    if (mysqli_query($conn, $insert_query)) {
        $cart_id = mysqli_insert_id($conn); // Get the auto-generated cart_id

        // Echo the inserted data
        echo "Cart ID: $cart_id<br>";
        echo "User ID: $user_id<br>";
        echo "Game ID: $published_game_id<br>";
        echo "Game Price: $game_price<br>";

        echo "</ul>";

    } else {
        echo "Error adding to cart: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request";
}
?>