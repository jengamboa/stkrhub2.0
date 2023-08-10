<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $built_game_id = $_POST['built_game_id']; // Added built_game_id
    $game_name = $_POST['game_name'];
    $game_price = $_POST['price'];


    // Insert data into the cart table
    $insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price) VALUES ('$user_id', '$game_id', '$built_game_id', NULL, 1, '$game_price')";

    if (mysqli_query($conn, $insert_query)) {
        $cart_id = mysqli_insert_id($conn); // Get the auto-generated cart_id

        // Echo the inserted data
        echo "Cart ID: $cart_id<br>";
        echo "User ID: $user_id<br>";
        echo "Game ID: $game_id<br>";
        echo "Built Game ID: $built_game_id<br>"; // Echoing the built_game_id
        echo "Game Name: $game_name<br>";
        echo "Game Price: $game_price<br>";

        // Echo all added_game_components info based on the game ID
        $query_components = "SELECT * FROM added_game_components WHERE game_id = '$game_id'";
        $result_components = mysqli_query($conn, $query_components);

        echo "<p>Added Game Components:</p>";
        echo "<ul>";
        while ($component = mysqli_fetch_assoc($result_components)) {
            echo "<li>";
            echo "Component ID: " . $component['added_component_id'] . "<br>";
            echo "Game ID: " . $component['game_id'] . "<br>";
            echo "Component ID: " . $component['component_id'] . "<br>";
            echo "Is Custom Design: " . ($component['is_custom_design'] == 1 ? 'Yes' : 'No') . "<br>";
            echo "Custom Design File Path: " . $component['custom_design_file_path'] . "<br>";
            echo "Quantity: " . $component['quantity'] . "<br>";
            echo "Color ID: " . $component['color_id'] . "<br>";
            echo "Size: " . $component['size'] . "<br>";
            // Add more details as needed
            echo "</li>";
        }
        echo "</ul>";

    } else {
        echo "Error adding to cart: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request";
}
?>