<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the data from the POST request
    $user_id = $_POST["user_id"] ?? null;
    $paypal_payment = $_POST["paypal_payment"] ?? null;
    $fullname = $_POST["fullname"] ?? null;
    $number = $_POST["number"] ?? null;
    $region = $_POST["region"] ?? null;
    $province = $_POST["province"] ?? null;
    $city = $_POST["city"] ?? null;
    $barangay = $_POST["barangay"] ?? null;
    $zip = $_POST["zip"] ?? null;
    $street = $_POST["street"] ?? null;
    $carts_selected = $_POST["carts_selected"] ?? null;


    $currentTimestamp = time();
    $formattedTimestamp = date("Y-m-d H:i:s", $currentTimestamp);

    $convertedTimestamp = str_replace(array('-', ' ', ':'), '', $formattedTimestamp);
    $unique_order_group_id = $convertedTimestamp;


    $cart_items = explode(',', $carts_selected);

    foreach ($cart_items as $cart_item) {

        $sql = "SELECT * FROM cart WHERE cart_id = $cart_item";
        $query = $conn->query($sql);

        if ($query) {
            while ($fetched = $query->fetch_assoc()) {
                $user_id = $fetched['user_id'];
                $published_game_id = $fetched['published_game_id'];
                $built_game_id = $fetched['built_game_id'];
                $added_component_id = $fetched['added_component_id'];
                $ticket_id = $fetched['ticket_id'];
                $quantity = $fetched['quantity'];
                $price = $fetched['price'];

                if ($ticket_id) {
                    $item_type = "ticket_id";
                    $item_id = $ticket_id;

                    $status = "is_received";
                    $status_value = 1;

                    $desired_markup = '';
                    $manufacturer_profit = '';
                    $creator_profit = '';
                    $marketplace_price = '';

                    $sqlTicketGamesOK = "SELECT * FROM tickets WHERE ticket_id = $ticket_id";
                    $queryTicketGamesOK = $conn->query($sqlTicketGamesOK);
                    while ($resultOK = $queryTicketGamesOK->fetch_assoc()) {
                        $game_id = $resultOK['game_id'];

                        $sqlUpdateGameTicket = "UPDATE games SET is_pending = 0, is_purchased = 1, to_approve = 1 WHERE game_id = $game_id";
                        $queryUpdateGameTicket = $conn->query($sqlUpdateGameTicket);
                        if ($queryUpdateGameTicket) {
                            echo "Game Ticket updated successfully.";
                        } else {
                            echo "Failed to update game ticket.";
                        }

                        $sqlUpdateGameTicket2 = "UPDATE tickets SET is_at_cart = 0, is_purchased = 1, is_accepted = 1 WHERE ticket_id = $ticket_id";
                        $queryUpdateGameTicket2 = $conn->query($sqlUpdateGameTicket2);
                        if ($queryUpdateGameTicket2) {
                            echo "Game Ticket updated successfully.";
                        } else {
                            echo "Failed to update game ticket.";
                        }
                    }
                } elseif ($published_game_id) {
                    $item_type = "published_game_id";
                    $item_id = $published_game_id;

                    $status = "is_pending";
                    $status_value = 1;

                    $sqlGetBreakdownPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                    $queryGetBreakdown = $conn->query($sqlGetBreakdownPublished);
                    while ($fetchedBreakdown = $queryGetBreakdown->fetch_assoc()) {
                        $desired_markup = $fetchedBreakdown['desired_markup'];
                        $manufacturer_profit = $fetchedBreakdown['manufacturer_profit'];
                        $creator_profit = $fetchedBreakdown['creator_profit'];
                        $marketplace_price = $fetchedBreakdown['marketplace_price'];
                    }
                } elseif ($built_game_id) {
                    $item_type = "built_game_id";
                    $item_id = $built_game_id;

                    $status = "is_pending";
                    $status_value = 1;

                    $desired_markup = '';
                    $manufacturer_profit = '';
                    $creator_profit = '';
                    $marketplace_price = '';

                    $sqlUpdateBuiltGame = "UPDATE built_games SET is_at_cart = 0, is_semi_purchased = 1 WHERE built_game_id = $built_game_id";
                    $queryUpdateBuiltGame = $conn->query($sqlUpdateBuiltGame);
                    if ($queryUpdateBuiltGame) {
                        echo "built_game_id updated successfully.";
                    } else {
                        echo "Failed to update built_game_id.";
                    }
                } elseif ($added_component_id) {
                    $item_type = "added_component_id";
                    $item_id = $added_component_id;

                    $status = "is_pending";
                    $status_value = 1;

                    $desired_markup = '';
                    $manufacturer_profit = '';
                    $creator_profit = '';
                    $marketplace_price = '';
                }

                $unique_id = uniqid();
                $unique_order_id = $item_id . $unique_id;

                $sqlInsertOrders = "INSERT INTO orders 
                (unique_order_id, unique_order_group_id, cart_id, user_id, $item_type, quantity, price, $status, desired_markup, manufacturer_profit, creator_profit, marketplace_price, fullname, number, region, province, city, barangay, zip, street, total_payment) 
                VALUES 
                ('$unique_order_id', '$unique_order_group_id', '$cart_item', '$user_id', '$item_id', '$quantity', '$price', '$status_value', '$desired_markup', '$manufacturer_profit', '$creator_profit', '$marketplace_price', '$fullname', '$number', '$region', '$province', '$city', '$barangay', '$zip', '$street', '$paypal_payment')";

                $queryInsertOrders = $conn->query($sqlInsertOrders);

                // Log an audit entry for the item
                if ($queryInsertOrders) {
                    $audit_message = "Purchase $item_type: $item_id";
                    $sqlInsertAuditLogs = "INSERT INTO audit_logs (user_id, action, details) VALUES ('$user_id', 'PAY USING STKR WALLET', '$audit_message')";

                    $queryInsertAuditLogs = $conn->query($sqlInsertAuditLogs);

                    if ($queryInsertAuditLogs) {
                        echo "AUDIT LOGGED: $audit_message<br>";

                        $sqlUpdateCart = "UPDATE cart SET is_visible = 0 WHERE cart_id = $cart_item";
                        $queryUpdateCart = $conn->query($sqlUpdateCart);
                        if ($queryUpdateCart) {
                            echo "Cart Updated is_visible = 0";
                        } else {
                            echo "error";
                        }
                    } else {
                        echo "Failed to log audit entry<br>";
                    }
                } else {
                    echo "Failed to insert order<br>";
                }
            }
        } else {
            echo "Failed to fetch cart item data<br>";
        }
    }


    echo "User ID: " . $user_id . "<br>";
    echo "PayPal Payment: " . $paypal_payment . "<br>";
    echo "Full Name: " . $fullname . "<br>";
    echo "Number: " . $number . "<br>";
    echo "Region: " . $region . "<br>";
    echo "Province: " . $province . "<br>";
    echo "City: " . $city . "<br>";
    echo "Barangay: " . $barangay . "<br>";
    echo "ZIP: " . $zip . "<br>";
    echo "Street: " . $street . "<br>";
    echo "Carts Selected: " . $carts_selected . "<br>";

    $sqlInsertWallet = "INSERT INTO wallet_transactions (user_id, transaction_type, amount, status, mode) VALUES ('$user_id', 'Pay', '$paypal_payment', 'success', 'STKR Wallet Pay')";
    $queryInsertWallet = $conn->query($sqlInsertWallet);

    $sqlUpdateUser = "UPDATE users SET wallet_amount = wallet_amount - $paypal_payment WHERE user_id = $user_id";
    if ($conn->query($sqlUpdateUser) === TRUE) {
        echo "Wallet amount updated successfully";
    } else {
        echo "Error updating wallet amount: " . $conn->error;
    }
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method.";
}
