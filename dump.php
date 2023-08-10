<?php
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve cart data including games and game components
$query_cart = "SELECT cart.cart_id, cart.game_id, cart.added_component_id, cart.quantity, cart.price,
              games.name AS game_name,
              added_game_components.is_custom_design, added_game_components.custom_design_file_path,
              added_game_components.quantity AS component_quantity, added_game_components.color_id, added_game_components.size
              FROM cart
              LEFT JOIN games ON cart.game_id = games.game_id
              LEFT JOIN added_game_components ON cart.added_component_id = added_game_components.added_component_id
              WHERE cart.user_id = '$user_id'";
$result_cart = mysqli_query($conn, $query_cart);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
</head>

<body>
    <div class="panel">
        <h2>Cart</h2>
        <form id="cartForm" method="post">
            <?php
            while ($item = mysqli_fetch_assoc($result_cart)) {
                echo '<div class="cart-item">';
                echo '<p><input type="checkbox" name="selectedItems[]" value="' . $item['cart_id'] . '"> Cart ID: ' . $item['cart_id'] . '</p>';
                echo '</div>';

                if (!empty($item['game_id'])) {
                    // Display game and dropdown of game components
                    echo '<p>Game: ' . $item['game_name'] . '</p>';

                    // Display added game components based on the game ID
                    echo '<p>Added Game Components:</p>';
                    echo '<table border="1">';
                    echo '<tr><th>Component ID</th><th>Is Custom Design</th><th>Custom Design File Path</th><th>Quantity</th><th>Color ID</th><th>Size</th></tr>';

                    // Loop through added game components for the current game
                    $query_components = "SELECT * FROM added_game_components WHERE game_id = " . $item['game_id'];
                    $result_components = mysqli_query($conn, $query_components);
                    while ($component = mysqli_fetch_assoc($result_components)) {
                        echo '<tr>';
                        echo '<td>' . $component['added_component_id'] . '</td>';
                        echo '<td>' . ($component['is_custom_design'] == 1 ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . $component['custom_design_file_path'] . '</td>';
                        echo '<td>' . $component['quantity'] . '</td>';
                        echo '<td>' . $component['color_id'] . '</td>';
                        echo '<td>' . $component['size'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    // Display individual game component
                    echo '<p>Game Component:</p>';
                    echo '<ul>';
                    echo '<li>Is Custom Design: ' . ($item['is_custom_design'] == 1 ? 'Yes' : 'No') . '</li>';
                    echo '<li>Custom Design File Path: ' . $item['custom_design_file_path'] . '</li>';
                    echo '<li>Quantity: ' . $item['quantity'] . '</li>';
                    echo '<li>Color ID: ' . $item['color_id'] . '</li>';
                    echo '<li>Size: ' . $item['size'] . '</li>';
                    echo '</ul>';
                }
                echo '</div>';

                // Quantity input with onchange attribute
                echo '<div class="cart-item">';
                echo '<label for="quantity_' . $item['cart_id'] . '">Quantity:</label>';
                echo '<input type="number" id="quantity_' . $item['cart_id'] . '" value="' . $item['quantity'] . '" onchange="updateQuantity(' . $item['cart_id'] . ', this.value)">';
                echo '</div>';
            }
            ?>
        </form>

        <button id="deleteButton">Delete Selected</button>
        <button id="purchaseButton">Purchase Selected</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function updateQuantity(cartId, newQuantity) {
            // Send AJAX request to update quantity
            $.ajax({
                url: 'process_update_quantity.php', // Replace with your PHP script
                method: 'POST',
                data: { cart_id: cartId, quantity: newQuantity },
                success: function (response) {
                    // Handle success (e.g., display updated cart or refresh page)
                    console.log('Quantity updated successfully');
                    // You can update the cart display here if needed
                },
                error: function (xhr, status, error) {
                    console.error('Error updating quantity:', error);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {

            $("#deleteButton").click(function () {
                $.ajax({
                    type: "POST",
                    url: "process_delete_cart.php",
                    data: $("#cartForm").serialize(),
                    success: function (response) {
                        // Handle the response from process_delete_cart.php if needed
                        console.log(response);
                        // For example, you could display a message
                        // alert("Items deleted successfully!");
                    },
                    error: function (xhr, status, error) {
                        // Handle errors if any
                        console.error(error);
                    }
                });
            });

            $("#purchaseButton").click(function () {
                $.ajax({
                    type: "POST",
                    url: "process_purchase_cart.php",
                    data: $("#cartForm").serialize(),
                    success: function (response) {
                        // Handle the response from process_delete_cart.php if needed
                        console.log(response);
                        // For example, you could display a message
                        // alert("Items deleted successfully!");
                    },
                    error: function (xhr, status, error) {
                        // Handle errors if any
                        console.error(error);
                    }
                });
            });
        });
    </script>



</body>



</html>