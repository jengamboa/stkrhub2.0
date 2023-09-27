<?php
include 'connection.php';

echo 'DELETEE';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
    echo '<h2>Selected Cart IDs:</h2>';
    echo '<ul>';
    foreach ($_POST['selectedItems'] as $cartId) {
        echo '<li>Cart ID: ' . $cartId . '</li>';

        // Delete the cart item from the database
        $delete_query = "DELETE FROM cart WHERE cart_id = '$cartId'";
        if (mysqli_query($conn, $delete_query)) {
            echo 'Deleted from database.';
        } else {
            echo 'Error deleting from database: ' . mysqli_error($conn);
        }
    }
    echo '</ul>';
} else {
    echo 'No items selected.';
}
?>