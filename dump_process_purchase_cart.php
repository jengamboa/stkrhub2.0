<?php
include 'connection.php';

echo '<h2>Summary of Added Items to Purchase:</h2>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
    echo '<ul>';
    foreach ($_POST['selectedItems'] as $cartId) {
        // Fetch cart item details based on cart_id
        $query = "SELECT c.*, bg.name AS game_name, bg.price AS game_price
                  FROM cart c
                  JOIN built_games bg ON c.built_game_id = bg.built_game_id
                  WHERE c.cart_id = '$cartId'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);

            echo '<li>';
            echo 'Cart ID: ' . $item['cart_id'] . '<br>';
            echo 'User ID: ' . $item['user_id'] . '<br>';
            echo 'Built Game ID: ' . $item['built_game_id'] . '<br>';
            echo 'Game Name: ' . $item['game_name'] . '<br>';
            echo 'Quantity: ' . $item['quantity'] . '<br>';
            echo 'Price: $' . $item['game_price'] . '<br>';
            echo '</li>';
        }
    }
    echo '</ul>';

    // Add a single "Buy" button that directs to payment.php
    echo '<form method="post" action="process_payment.php">';
    foreach ($_POST['selectedItems'] as $cartId) {
        echo '<input type="hidden" name="selectedItems[]" value="' . $cartId . '">';
    }
    echo '<button type="submit" name="buy">Buy</button>';
    echo '</form>';
} else {
    echo 'No items selected.';
}
?>