<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];
    $user_id = $_POST['user_id'];

    // Check if the item already exists in the cart for the user
    $existingCartItemSql = "SELECT * FROM cart WHERE user_id = '$user_id' AND built_game_id = '$built_game_id' AND is_visible != 0";
    $existingCartItemQuery = $conn->query($existingCartItemSql);

    if ($existingCartItemQuery->num_rows > 0) {
        // If the item exists, update the quantity
        $existingCartItem = $existingCartItemQuery->fetch_assoc();
        $newQuantity = $existingCartItem['quantity'] + 1;

        $updateQuantitySql = "UPDATE cart SET quantity = '$newQuantity' WHERE user_id = '$user_id' AND built_game_id = '$built_game_id'";

        if (mysqli_query($conn, $updateQuantitySql)) {
            echo 'Quantity updated successfully';
        } else {
            echo 'Error updating quantity: ' . mysqli_error($conn);
        }
    } else {
        // If the item doesn't exist, insert a new record
        $sql = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
        $query = $conn->query($sql);

        if ($query->num_rows > 0) {
            $fetched = $query->fetch_assoc();
            $game_id = $fetched['game_id'];
            $price = $fetched['price'];

            // Insert data into the cart table
            $insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, quantity, price) 
            VALUES ('$user_id', '$game_id', '$built_game_id', 1, '$price')";

            if (mysqli_query($conn, $insert_query)) {
                echo 'Successfully inserted a new item into the cart';
            } else {
                echo 'Error inserting into the cart: ' . mysqli_error($conn);
            }
        }
    }
}
?>
