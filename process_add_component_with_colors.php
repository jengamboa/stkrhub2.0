<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_with_colors'])) {
    $game_id = $_POST['game_id'];
    $component_id = $_POST['component_id'];
    $selected_color_id = $_POST['selected_color'];

    // Insert the color information into the added_game_components table
    $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id) 
                     VALUES ('$game_id', '$component_id', '$selected_color_id')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        // Color information added successfully, redirect to game dashboard
        header("Location: game_dashboard.php?game_id=$game_id");
        exit;
    } else {
        echo "Error inserting color information: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Invalid request";
}
?>
