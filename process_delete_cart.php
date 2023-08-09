<?php
include 'connection.php';
include 'html/header.html.php';

if (isset($_POST['deleteSelected'])) {
    // Check if selectedItems array is present in the POST data
    if (isset($_POST['cartIds']) && is_array($_POST['cartIds'])) {
        echo '<h2>Selected Cart IDs to Delete:</h2>';
        echo '<ul>';
        // Loop through selected cart IDs and echo them in a list
        foreach ($_POST['cartIds'] as $cartId) {
            echo '<li>Cart ID: ' . $cartId . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No items selected for deletion.';
    }
}
?>
