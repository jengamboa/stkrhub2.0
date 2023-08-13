<?php
include 'connection.php';

echo '<h2>Payment Summary:</h2>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
    echo '<ul>';
    foreach ($_POST['selectedItems'] as $cartId) {
        // Fetch cart item details based on cart_id
        $query = "SELECT c.*, bg.name AS game_name, bg.price AS game_price
                  FROM cart c
                  LEFT JOIN built_games bg ON c.built_game_id = bg.built_game_id
                  WHERE c.cart_id = '$cartId'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);

            echo '<li>';
            echo 'Cart ID: ' . $item['cart_id'] . '<br>';
            echo 'User ID: ' . $item['user_id'] . '<br>';

            // Check if the item is a complete game with components
            if (!empty($item['built_game_id'])) {
                echo 'Built Game ID: ' . $item['built_game_id'] . '<br>';
                echo 'Game Name: ' . $item['game_name'] . '<br>';
            }

            // Check if the item is a single game component
            if (!empty($item['added_component_id'])) {
                echo 'Added Component ID: ' . $item['added_component_id'] . '<br>';
            }

            echo 'Quantity: ' . $item['quantity'] . '<br>';
            echo 'Price: $' . $item['game_price'] . '<br>';
            echo '</li>';

            // Determine the appropriate column values for insertion
            $built_game_id = !empty($item['built_game_id']) ? $item['built_game_id'] : 'NULL';
            $added_component_id = !empty($item['added_component_id']) ? $item['added_component_id'] : 'NULL';

            // Insert the order into the orders table with is_pending and is_preparing set to 1
            $insert_order_query = "INSERT INTO orders (cart_id, user_id, built_game_id, added_component_id, quantity, price, is_pending, is_ready, is_shipped, is_completed, is_canceled, is_preparing, order_date)
                                   VALUES ('{$item['cart_id']}', '{$item['user_id']}', $built_game_id, $added_component_id, '{$item['quantity']}', '{$item['game_price']}', 1, 0, 0, 0, 0, 0, NOW())";
            mysqli_query($conn, $insert_order_query);
        }
    }
    echo '</ul>';
} else {
    echo 'No items selected.';
}
?>
