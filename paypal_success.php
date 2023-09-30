<?php
// Check if the request method is POST
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
?>
