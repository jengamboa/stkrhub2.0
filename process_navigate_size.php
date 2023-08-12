<?php
include 'connection.php';
include 'html/header.html.php';

// Retrieve the selected component ID from the form submission
if (isset($_POST['selected_component_id'])) {
    $selected_component_id = $_POST['selected_component_id'];

    // Redirect to the respective game component details page with parameters
    header("Location: game_component_details.php?game_id={$_POST['game_id']}&game_name={$_POST['game_name']}&component_id={$selected_component_id}");
    exit;
} else {
    echo '<p>No component selected.</p>';
}
?>
