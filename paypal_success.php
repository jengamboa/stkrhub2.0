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
    $payment_id = $_POST["payment_id"] ?? null;

    // Extract data from the "order_data" sub-array
    $order_data_id = $_POST["order_data"]["id"] ?? null;

    $order_data_intent = $_POST["order_data"]["intent"] ?? null;
    $order_data_status = $_POST["order_data"]["status"] ?? null;
    $order_data_currency_code = $_POST["order_data"]["purchase_units"][0]["amount"]["currency_code"] ?? null;
    $order_data_amount = $_POST["order_data"]["purchase_units"][0]["amount"]["value"] ?? null;
    $order_data_payee_email = $_POST["order_data"]["purchase_units"][0]["payee"]["email_address"] ?? null;
    $order_data_payee_merchant_id = $_POST["order_data"]["purchase_units"][0]["payee"]["merchant_id"] ?? null;
    $order_data_capture_id = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["id"] ?? null;
    $order_data_capture_status = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["status"] ?? null;
    $order_data_capture_currency_code = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["amount"]["currency_code"] ?? null;
    $order_data_capture_amount = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["amount"]["value"] ?? null;
    $order_data_capture_final_capture = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["final_capture"] ?? null;
    $order_data_capture_seller_protection_status = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["seller_protection"]["status"] ?? null;
    $order_data_capture_dispute_categories = implode(", ", $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["seller_protection"]["dispute_categories"] ?? []);
    $order_data_capture_create_time = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["create_time"] ?? null;
    $order_data_capture_update_time = $_POST["order_data"]["purchase_units"][0]["payments"]["captures"][0]["update_time"] ?? null;

    // Extract payer information from the "order_data" sub-array
    $payer_given_name = $_POST["order_data"]["payer"]["name"]["given_name"] ?? null;
    $payer_surname = $_POST["order_data"]["payer"]["name"]["surname"] ?? null;
    $payer_email = $_POST["order_data"]["payer"]["email_address"] ?? null;
    $payer_id = $_POST["order_data"]["payer"]["payer_id"] ?? null;
    $payer_country_code = $_POST["order_data"]["payer"]["address"]["country_code"] ?? null;


    $currentTimestamp = time();
    $formattedTimestamp = date("Y-m-d H:i:s", $currentTimestamp);

    $convertedTimestamp = str_replace(array('-', ' ', ':'), '', $formattedTimestamp);
    $unique_order_group_id = $convertedTimestamp;




    $sqlInsertPaypalTransaction = "INSERT INTO paypal_transactions (
    paypal_transaction_id,
    order_data_intent,
    order_data_status,
    order_data_currency_code,
    order_data_amount,
    order_data_payee_email,
    order_data_payee_merchant_id,
    order_data_capture_id,
    order_data_capture_status,
    order_data_capture_currency_code,
    order_data_capture_amount,
    order_data_capture_final_capture,
    order_data_capture_seller_protection_status,
    order_data_capture_dispute_categories,
    order_data_capture_create_time,
    order_data_capture_update_time,
    payer_given_name,
    payer_surname,
    payer_email,
    payer_id,
    payer_country_code) VALUES (
    '$order_data_id',
    '$order_data_intent',
    '$order_data_status',
    '$order_data_currency_code',
    '$order_data_amount',
    '$order_data_payee_email',
    '$order_data_payee_merchant_id',
    '$order_data_capture_id',
    '$order_data_capture_status',
    '$order_data_capture_currency_code',
    '$order_data_capture_amount',
    '$order_data_capture_final_capture',
    '$order_data_capture_seller_protection_status',
    '$order_data_capture_dispute_categories',
    '$order_data_capture_create_time',
    '$order_data_capture_update_time',
    '$payer_given_name',
    '$payer_surname',
    '$payer_email',
    '$payer_id',
    '$payer_country_code')";
    $queryInsertPaypalTransaction = $conn->query($sqlInsertPaypalTransaction);

    if ($queryInsertPaypalTransaction) {
        echo "Data inserted into paypal_transactions table successfully.";
    } else {
        echo "Error: " . $conn->error;
    }



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
                (unique_order_id, unique_order_group_id, cart_id, user_id, $item_type, quantity, price, $status, desired_markup, manufacturer_profit, creator_profit, marketplace_price, fullname, number, region, province, city, barangay, zip, street, total_payment, paypal_transaction_id, payer_id, order_data_payee_email) 
                VALUES 
                ('$unique_order_id', '$unique_order_group_id', '$cart_item', '$user_id', '$item_id', '$quantity', '$price', '$status_value', '$desired_markup', '$manufacturer_profit', '$creator_profit', '$marketplace_price', '$fullname', '$number', '$region', '$province', '$city', '$barangay', '$zip', '$street', '$paypal_payment', '$order_data_id', '$payer_id', '$order_data_payee_email')";

                $queryInsertOrders = $conn->query($sqlInsertOrders);

                // Log an audit entry for the item
                if ($queryInsertOrders) {
                    $audit_message = "Purchase $item_type: $item_id";
                    $sqlInsertAuditLogs = "INSERT INTO audit_logs (user_id, action, details) VALUES ('$user_id', 'PAY USING PAYPAL', '$audit_message')";

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







    // Check if the required data exists
    if (
        $user_id !== null && $paypal_payment !== null && $fullname !== null && $number !== null && $region !== null &&
        $province !== null && $city !== null && $barangay !== null && $zip !== null && $street !== null &&
        $carts_selected !== null && $payment_id !== null && $order_data_id !== null &&
        $order_data_intent !== null && $order_data_status !== null && $order_data_currency_code !== null &&
        $order_data_amount !== null && $order_data_payee_email !== null && $order_data_payee_merchant_id !== null &&
        $order_data_capture_id !== null && $order_data_capture_status !== null &&
        $order_data_capture_currency_code !== null && $order_data_capture_amount !== null &&
        $order_data_capture_final_capture !== null && $order_data_capture_seller_protection_status !== null &&
        $order_data_capture_create_time !== null && $order_data_capture_update_time !== null &&
        $payer_given_name !== null && $payer_surname !== null && $payer_email !== null &&
        $payer_id !== null && $payer_country_code !== null
    ) {
        // Your processing code here

        // Echo all the data
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
        echo "Payment ID: " . $payment_id . "<br>";

        // Echo PayPal transaction details
        echo "PayPal Transaction ID: " . $order_data_id . "<br>";
        echo "PayPal Transaction Intent: " . $order_data_intent . "<br>";
        echo "PayPal Transaction Status: " . $order_data_status . "<br>";
        echo "PayPal Currency Code: " . $order_data_currency_code . "<br>";
        echo "PayPal Transaction Amount: " . $order_data_amount . "<br>";
        echo "PayPal Payee Email: " . $order_data_payee_email . "<br>";
        echo "PayPal Payee Merchant ID: " . $order_data_payee_merchant_id . "<br>";

        // Echo PayPal capture details
        echo "PayPal Capture ID: " . $order_data_capture_id . "<br>";
        echo "PayPal Capture Status: " . $order_data_capture_status . "<br>";
        echo "PayPal Capture Currency Code: " . $order_data_capture_currency_code . "<br>";
        echo "PayPal Capture Amount: " . $order_data_capture_amount . "<br>";
        echo "PayPal Capture Final Capture: " . $order_data_capture_final_capture . "<br>";
        echo "PayPal Capture Seller Protection Status: " . $order_data_capture_seller_protection_status . "<br>";
        echo "PayPal Capture Dispute Categories: " . $order_data_capture_dispute_categories . "<br>";
        echo "PayPal Capture Create Time: " . $order_data_capture_create_time . "<br>";
        echo "PayPal Capture Update Time: " . $order_data_capture_update_time . "<br>";

        // Echo payer information
        echo "Payer Given Name: " . $payer_given_name . "<br>";
        echo "Payer Surname: " . $payer_surname . "<br>";
        echo "Payer Email: " . $payer_email . "<br>";
        echo "Payer ID: " . $payer_id . "<br>";
        echo "Payer Country Code: " . $payer_country_code . "<br>";

        // You can customize the response as needed
    } else {
        // Handle missing data here if needed
        echo "Missing or incomplete data.";
    }
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method.";
}
