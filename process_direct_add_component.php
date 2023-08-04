<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['direct_add'])) {
    $component_id = $_POST['component_id'];
    $game_id = $_POST['game_id']; // Get the game ID from the form

    // Echo the values passed from the previous page
    echo "Game ID: " . $game_id . "<br>";
    echo "Component ID: " . $component_id . "<br>";

    // Insert the new component into the added_game_components table
    $insert_query = "INSERT INTO added_game_components (game_id, component_id, is_custom_design, custom_design_file_path)
                     VALUES ('$game_id', '$component_id', 0, '')"; // is_custom_design = 0 for no custom design

    if (mysqli_query($conn, $insert_query)) {
        // Redirect back to the game dashboard after successful addition
        header("Location: game_dashboard.php?game_id=$game_id");
        exit;
    } else {
        // Handle the error if the insert fails
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        exit;
    }
}
?>
