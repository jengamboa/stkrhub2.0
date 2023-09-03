<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    // Get the selected address details
    $selectedAddressId = $_POST['selectedAddressId'];
    $selectedAddressFullname = $_POST['selectedAddressFullname'];
    $selectedAddressNumber = $_POST['selectedAddressNumber'];
    $selectedAddressRegion = $_POST['selectedAddressRegion'];
    $selectedAddressProvince = $_POST['selectedAddressProvince'];
    $selectedAddressCity = $_POST['selectedAddressCity'];
    $selectedAddressBarangay = $_POST['selectedAddressBarangay'];
    $selectedAddressZip = $_POST['selectedAddressZip'];
    $selectedAddressStreet = $_POST['selectedAddressStreet'];

    // Now you can echo these values as needed
    echo "Selected Address ID: " . $selectedAddressId . "<br>";
    echo "Full Name: " . $selectedAddressFullname . "<br>";
    echo "Number: " . $selectedAddressNumber . "<br>";
    echo "Region: " . $selectedAddressRegion . "<br>";
    echo "Province: " . $selectedAddressProvince . "<br>";
    echo "City: " . $selectedAddressCity . "<br>";
    echo "Barangay: " . $selectedAddressBarangay . "<br>";
    echo "ZIP: " . $selectedAddressZip . "<br>";
    echo "Street: " . $selectedAddressStreet . "<br>";


    // Get the selected cart items from the hidden field
    $selectedItems = isset($_POST['selectedItems']) ? $_POST['selectedItems'] : '';

    // Explode the comma-separated list of cart IDs into an array
    $cartIds = explode(",", $selectedItems);

    // Get the user ID
    $user_id = $_SESSION['user_id'];

    // Loop through the cart IDs and insert into the orders table
    foreach ($cartIds as $cart_id) {
        // Use prepared statement to prevent SQL injection
        $query = "INSERT INTO orders (cart_id, user_id, published_game_id, built_game_id, added_component_id, quantity, price, is_pending, order_date, desired_markup, manufacturer_profit, creator_profit, marketplace_price)
                  SELECT cart.cart_id, cart.user_id, cart.published_game_id, cart.built_game_id, cart.added_component_id, cart.quantity, cart.price, 1, NOW(), published_built_games.desired_markup, published_built_games.manufacturer_profit, published_built_games.creator_profit, published_built_games.marketplace_price
                  FROM cart
                  LEFT JOIN published_built_games ON cart.published_game_id = published_built_games.published_game_id
                  WHERE cart.cart_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $cart_id);
        mysqli_stmt_execute($stmt);

        // Get the last inserted order_id
        $lastOrderId = mysqli_insert_id($conn);
        echo $lastOrderId;

        // Update the cart item's is_active status to 0
        $updateQuery = "UPDATE cart SET is_active = 0 WHERE cart_id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "i", $cart_id);
        mysqli_stmt_execute($updateStmt);

        $updateAddressQuery = "UPDATE orders 
                      SET fullname = ?, number = ?, region = ?, province = ?, city = ?, barangay = ?, zip = ?, street = ?
                      WHERE order_id = ?";
        $updateAddressStmt = mysqli_prepare($conn, $updateAddressQuery);
        mysqli_stmt_bind_param($updateAddressStmt, "ssssssssi", $selectedAddressFullname, $selectedAddressNumber, $selectedAddressRegion, $selectedAddressProvince, $selectedAddressCity, $selectedAddressBarangay, $selectedAddressZip, $selectedAddressStreet, $lastOrderId);
        mysqli_stmt_execute($updateAddressStmt);


    }

    // Redirect to a success page or display a success message
    header("Location: cart.php");
    exit;
} else {
    echo "Invalid request method";
}
?>