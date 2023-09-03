<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    // Get the selected cart items from the form
    $selectedItems = isset($_POST['selectedItems']) ? $_POST['selectedItems'] : array();

    // Retrieve the user ID
    $user_id = $_SESSION['user_id'];

    // Retrieve the user's default address from the addresses table
    $getDefaultAddressQuery = "SELECT * FROM addresses WHERE user_id = ? AND is_default = 1";
    $stmt = mysqli_prepare($conn, $getDefaultAddressQuery);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $defaultAddressResult = mysqli_stmt_get_result($stmt);

    // Retrieve the user's other addresses (not default) from the addresses table
    $getOtherAddressesQuery = "SELECT * FROM addresses WHERE user_id = ? AND is_default = 0";
    $stmt = mysqli_prepare($conn, $getOtherAddressesQuery);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $otherAddressesResult = mysqli_stmt_get_result($stmt);



    // Loop through the selected cart items and process them
    foreach ($selectedItems as $cart_id) {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM cart WHERE cart_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $cart_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $item = mysqli_fetch_assoc($result);

        if ($item) {
            echo "Cart ID: " . $item['cart_id'] . "<br>";
            echo "User ID: " . $item['user_id'] . "<br>";
            if (!empty($item['published_game_id'])) {
                echo "There is published game id";
                $published_game_id = $item['published_game_id'];
                echo $published_game_id;

                // Use prepared statements to prevent SQL injection
                $query = "SELECT desired_markup, manufacturer_profit, creator_profit, marketplace_price FROM published_built_games WHERE published_game_id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $published_game_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and print the values of desired_markup, manufacturer_profit, creator_profit, and marketplace_price columns
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<br>Desired Markup: " . $row['desired_markup'] . "<br>";
                        echo "Manufacturer Profit: " . $row['manufacturer_profit'] . "<br>";
                        echo "Creator Profit: " . $row['creator_profit'] . "<br>";
                        echo "Marketplace Price: " . $row['marketplace_price'] . "<br>";
                    }
                } else {
                    echo "No rows found";
                }


            }
            echo "<br> Built Game ID: " . $item['built_game_id'] . "<br>";
            echo "Added Component ID: " . $item['added_component_id'] . "<br>";
            echo "Quantity: " . $item['quantity'] . "<br>";
            echo "Price: " . $item['price'] . "<br>";
            echo "Is Active: " . $item['is_active'] . "<br>";
            echo "------------------------------------<br>";
        }
    }

    // Add the "Buy" button that directs to process_payment.php
    echo '<form method="post" action="process_payment.php">';
    echo '<input type="hidden" name="selectedItems" value="' . implode(",", $selectedItems) . '">';

    // Check if there is a default address
    if (mysqli_num_rows($defaultAddressResult) > 0) {
        // Display the default address at the top
        $defaultAddress = mysqli_fetch_assoc($defaultAddressResult);

        // Include address details as hidden fields
        echo '<input type="hidden" name="selectedAddressId" value="' . $defaultAddress['address_id'] . '">';
        echo '<input type="hidden" name="selectedAddressFullname" value="' . $defaultAddress['fullname'] . '">';
        echo '<input type="hidden" name="selectedAddressNumber" value="' . $defaultAddress['number'] . '">';
        echo '<input type="hidden" name="selectedAddressRegion" value="' . $defaultAddress['region'] . '">';
        echo '<input type="hidden" name="selectedAddressProvince" value="' . $defaultAddress['province'] . '">';
        echo '<input type="hidden" name="selectedAddressCity" value="' . $defaultAddress['city'] . '">';
        echo '<input type="hidden" name="selectedAddressBarangay" value="' . $defaultAddress['barangay'] . '">';
        echo '<input type="hidden" name="selectedAddressZip" value="' . $defaultAddress['zip'] . '">';
        echo '<input type="hidden" name="selectedAddressStreet" value="' . $defaultAddress['street'] . '">';

        // Display the default address
        echo 'Select an Address:<br>';
        echo '<input type="radio" name="selectedAddress" value="' . $defaultAddress['address_id'] . '" checked> ' . $defaultAddress['fullname'] . ', ' . $defaultAddress['number'] . ', ' . $defaultAddress['region'] . ', ' . $defaultAddress['province'] . ', ' . $defaultAddress['city'] . ', ' . $defaultAddress['barangay'] . ', ' . $defaultAddress['zip'] . ', ' . $defaultAddress['street'] . '<br>';

        // Display the other addresses
        while ($row = mysqli_fetch_assoc($otherAddressesResult)) {
            echo '<input type="radio" name="selectedAddressId" value="' . $row['address_id'] . '"> ' . $row['fullname'] . ', ' . $row['number'] . ', ' . $row['region'] . ', ' . $row['province'] . ', ' . $row['city'] . ', ' . $row['barangay'] . ', ' . $row['zip'] . ', ' . $row['street'] . '<br>';
        }
    } else {
        echo "No addresses found for this user.";
    }

    echo '<button type="submit">Buy</button>';
    echo '</form>';
} else {
    echo "Invalid request method";
}
?>