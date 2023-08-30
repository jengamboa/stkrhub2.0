<?php
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve cart data including games and game components with is_active = 1
$query_cart = "SELECT cart.cart_id, cart.built_game_id, cart.added_component_id, cart.quantity, cart.price,
              built_games.name AS game_name,
              built_games_added_game_components.is_custom_design, built_games_added_game_components.custom_design_file_path,
              built_games_added_game_components.quantity AS component_quantity, built_games_added_game_components.color_id, built_games_added_game_components.size
              FROM cart
              LEFT JOIN built_games ON cart.built_game_id = built_games.built_game_id
              LEFT JOIN built_games_added_game_components ON cart.added_component_id = built_games_added_game_components.added_component_id
              WHERE cart.user_id = '$user_id' AND cart.is_active = 1";
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
        <form id="cartForm" method="post" action="process_purchase_cart.php">
            <?php
            while ($item = mysqli_fetch_assoc($result_cart)) {
                echo '<div class="cart-item">';
                echo '<p><input type="checkbox" name="selectedItems[]" value="' . $item['cart_id'] . '"> Cart ID: ' . $item['cart_id'] . '</p>';
                echo '</div>';

                if (!empty($item['built_game_id'])) {
                    // Display built game and its components
                    echo '<p>Built Game: ' . $item['game_name'] . '</p>';

                    // Display added game components for the current built game
                    echo '<p>Added Game Components:</p>';
                    echo '<table border="1">';
                    echo '<tr><th>Component ID</th><th>Is Custom Design</th><th>Custom Design File Path</th><th>Quantity</th><th>Color ID</th><th>Size</th></tr>';

                    // Loop through added game components for the current built game
                    $query_components = "SELECT * FROM built_games_added_game_components WHERE built_game_id = " . $item['built_game_id'];
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
                }

                echo '</div>';

                // Quantity input with onchange attribute
                echo '<div class="cart-item">';
                echo '<label for="quantity_' . $item['cart_id'] . '">Quantity:</label>';
                echo '<input type="hidden" name="' . $item['cart_id'] . '">';
                echo '<input type="number" id="quantity_' . $item['cart_id'] . '" value="' . $item['quantity'] . '" onchange="updateQuantity(' . $item['cart_id'] . ', this.value)">';
                echo '</div>';
            }
            ?>

            <button id="purchaseButton">Purchase Selected</button>
        </form>

        <button id="deleteButton">Delete Selected</button>
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
        });
    </script>
</body>

</html>
