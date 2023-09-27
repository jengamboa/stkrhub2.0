<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id = $_POST['cart_id'];

    $conn->begin_transaction();

    try {

        $sqlGetCart = "SELECT * FROM cart WHERE cart_id = $cart_id";
        $queryGetCart = $conn->query($sqlGetCart);
        while ($fetchedCart = $queryGetCart->fetch_assoc()) {
            $is_active = $fetchedCart['is_active'];
        }

        if ($is_active == 1) {
            $sqlUpdateCart = "UPDATE cart SET is_active = 0 WHERE cart_id = $cart_id";
            $conn->query($sqlUpdateCart);
        } else {
            $sqlUpdateCart = "UPDATE cart SET is_active = 1 WHERE cart_id = $cart_id";
            $conn->query($sqlUpdateCart);
        }

        

        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
?>
