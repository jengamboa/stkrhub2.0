<?php

include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['direct_add'])) {
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $component_id = $_POST['component_id'];
    $component_name = $_POST['component_name'];
    $component_price = $_POST['component_price'];
    $component_category = $_POST['component_category'];
    $selected_size = $_POST['selected_size'];

    // Now you can use these variables in your logic

    // Check if game_id exists (it's part of a game) or not
    if ($game_id !== '') {

        // Echo the values passed from the previous page
        echo "Game ID: " . $game_id . "<br>";
        echo "Component ID: " . $component_id . "<br>";
        echo "Selected Size: " . $selected_size . "<br>";

        // Insert the new component into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path)
                             VALUES ('$game_id', '$component_id', '$selected_size', 0, '')"; // is_custom_design = 0 for no custom design

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

        // Echo the values for the single game component
        echo "Game ID: " . $game_id . "<br>"; // Since game_id is not available for single components, you might want to display a placeholder value or message
        echo "Component ID: " . $component_id . "<br>";
    }

    // Rest of your logic goes here...
}
?>