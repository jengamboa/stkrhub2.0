<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cash_out_amount = $_POST["cash_out_amount"];
    $cash_out_paypal_email = $_POST["cash_out_paypal_email"];
    $user_id = $_POST["user_id"];
    $cash_out_fee = $_POST["cash_out_fee"];

    $conn->begin_transaction();

    try {
        $paypal_email_destination = $cash_out_paypal_email;

        $sqlInsertWallet = "INSERT INTO wallet_transactions (user_id, transaction_type, amount, status, mode, paypal_transaction_id, paypal_email_destination, cash_out_fee) VALUES ('$user_id', 'Cash Out', '$cash_out_amount', 'pending', 'Paypal', '', '$paypal_email_destination', '$cash_out_fee')";
        $queryInsertWallet = $conn->query($sqlInsertWallet);

        $conn->commit();

        $response = ["success" => true, "message" => "Success"];
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
