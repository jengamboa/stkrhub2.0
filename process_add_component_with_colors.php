<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_with_colors'])) {
    $game_id = $_POST['game_id'];
    $component_id = $_POST['component_id'];
    $selected_color_id = $_POST['selected_color'];
    $quantity = $_POST['quantity'];

    $sqlGetComponentDetails = "SELECT * FROM game_components WHERE component_id = $component_id";
    $queryGetComponentDetails = $conn->query($sqlGetComponentDetails);
    while ($fetchedComponentDetails = $queryGetComponentDetails->fetch_assoc()) {
        $component_name = $fetchedComponentDetails['component_name'];
        $component_description = $fetchedComponentDetails['description'];
        $component_price = $fetchedComponentDetails['price'];
        $component_category = $fetchedComponentDetails['category'];
        $component_assets = $fetchedComponentDetails['assets'];
        $component_has_colors = $fetchedComponentDetails['has_colors'];
        $component_size = $fetchedComponentDetails['size'];
    }

    echo $game_id;

    if ($game_id == 0) {
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id, quantity, size, user_id) 
        VALUES (NULL, '$component_id', '$selected_color_id', '$quantity', '$component_size', '$user_id')";

        if (mysqli_query($conn, $insert_query)) {
            echo "Single game component inserted into added_game_components successfully.<br>";

            $added_component_id = mysqli_insert_id($conn);

            $cart_insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price, is_active)
                          VALUES ('$user_id', NULL, NULL, '$added_component_id', '$quantity', '$component_price', 1)";

            if (mysqli_query($conn, $cart_insert_query)) {
                echo "Single game component inserted into cart successfully with quantity $quantity.";
            }

            header('location: cart_page.php');
        }
    } elseif ($game_id !== 0) {
        // Insert the new component into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id, quantity, size, user_id) 
        VALUES ('$game_id', '$component_id', '$selected_color_id', '$quantity', '$component_size', '$user_id')";

        date_default_timezone_set('Asia/Manila');
        $currentTimestamp = date('Y-m-d H:i:s');
        $sqlUpdateDateModified = "UPDATE games SET date_modified = '$currentTimestamp' WHERE game_id = $game_id";
        if ($conn->query($sqlUpdateDateModified)) {
            echo 'updated date modified';
        }


        if (mysqli_query($conn, $insert_query)) {
            // Redirect back to the game dashboard after successful addition
            header("Location: game_dashboard.php?game_id=$game_id");
            exit;
        }
    }
}
