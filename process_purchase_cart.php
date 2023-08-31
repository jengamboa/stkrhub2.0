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
    echo '<button type="submit">Buy</button>';
    echo '</form>';
} else {
    echo "Invalid request method";
}
?>