<?php
include 'connection.php';

echo 'PURCHASE';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
    echo '<h2>Selected Cart IDs:</h2>';
    echo '<ul>';
    foreach ($_POST['selectedItems'] as $cartId) {
        echo '<li>Cart ID: ' . $cartId . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No items selected.';
}

    // Redirect back to index.php
    // header("Location: cart.php");
    // exit();
?>
