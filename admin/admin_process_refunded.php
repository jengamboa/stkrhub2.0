<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wallet_transaction_id = $_POST['wallet_transaction_id'];
    $creator_id = $_POST['creator_id'];
    $paypal_email_destination = $_POST["paypal_email_destination"];
    $amount = $_POST["amount"];

    $conn->begin_transaction();

    try {

        $sqlInsertWallet = "UPDATE wallet_transactions SET status = 'success', cash_out_timestamp = NOW() WHERE wallet_transaction_id = $wallet_transaction_id";
        $queryInsertWallet = $conn->query($sqlInsertWallet);

        $sqlUpdateUser = "UPDATE users SET wallet_amount = wallet_amount - $amount WHERE user_id = $creator_id";
        if ($conn->query($sqlUpdateUser) === TRUE) {
            echo "Wallet amount updated successfully";
        } else {
            echo "Error updating wallet amount: " . $conn->error;
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
