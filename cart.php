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
            }
            ?>
        </form>

        <button id="deleteButton">Delete Selected</button>
        <button id="purchaseButton">Purchase Selected</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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