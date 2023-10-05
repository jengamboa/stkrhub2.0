<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['cartIds'] as $cartId) {
        $cartId = intval($cartId);
        $sql = "UPDATE cart SET is_active = 1 WHERE cart_id = $cartId";
        if ($conn->query($sql)) {
            echo "Cart ID $cartId is now active.";
        } else {
            echo "Error updating cart ID $cartId: " . $conn->error;
        }
    }
}
