<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['direct_add'])) {
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $component_id = $_POST['component_id'];
    $component_name = $_POST['component_name'];
    $component_price = $_POST['component_price'];
    $component_category = $_POST['component_category'];
    $selected_size = $_POST['selected_size'];
    $quantity = $_POST['quantity']; // Include quantity

    // Get the user_id from the session
    $user_id = $_SESSION['user_id'];

    // Check if game_id exists (it's part of a game) or not
    if ($game_id !== '') {

        // Echo the values passed from the previous page
        echo "Game ID: " . $game_id . "<br>";
        echo "Component ID: " . $component_id . "<br>";
        echo "Selected Size: " . $selected_size . "<br>";
        echo "Quantity: " . $quantity . "<br>";

        // Insert the new component into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, is_custom_design, custom_design_file_path, quantity, size, user_id)
                     VALUES ('$game_id', '$component_id', 0, '', '$quantity', '$selected_size', '$user_id')";

        if (mysqli_query($conn, $insert_query)) {
            // Redirect back to the game dashboard after successful addition
            header("Location: game_dashboard.php?game_id=$game_id");
            exit;
        } else {
            // Handle the error if the insert fails
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            exit;
        }

    } else {
        echo "It is a single game component.<br>";

        // Insert the single game component into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path, user_id)
                     VALUES (NULL, '$component_id', '$selected_size', 0, '', '$user_id')";

        if (mysqli_query($conn, $insert_query)) {
            echo "Single game component inserted into added_game_components successfully.<br>";

            // Retrieve the last inserted ID for the added component
            $added_component_id = mysqli_insert_id($conn);

            // Insert the single game component into the cart table
            $cart_insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price, is_active)
                          VALUES ('$user_id', NULL, NULL, '$added_component_id', '$quantity', '$component_price', 1)";

            if (mysqli_query($conn, $cart_insert_query)) {
                echo "Single game component inserted into cart successfully with quantity $quantity.";
            } else {
                echo "Error inserting single game component into cart: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting single game component into added_game_components: " . mysqli_error($conn);
        }
    }
}
?>