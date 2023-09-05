<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['game_id']) && isset($_GET['component_id']) && isset($_GET['color_id']) && isset($_GET['added_component_id'])) {
    $game_id = $_GET['game_id'];
    $component_id = $_GET['component_id'];
    $color_id = $_GET['color_id'];
    $added_component_id = $_GET['added_component_id'];

    // Perform the necessary database update to change the color_id of the added_game_component
    $update_query = "UPDATE added_game_components SET color_id = '$color_id' WHERE added_component_id = '$added_component_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Retrieve added_game_component details
        $query_component = "SELECT agc.added_component_id, agc.color_id, gc.component_name FROM added_game_components agc INNER JOIN game_components gc ON agc.component_id = gc.component_id WHERE agc.added_component_id = '$added_component_id'";
        $result_component = mysqli_query($conn, $query_component);
        $component = mysqli_fetch_assoc($result_component);

        // Retrieve color details
        $query_color = "SELECT color_name FROM component_colors WHERE color_id = '$color_id'";
        $result_color = mysqli_query($conn, $query_color);
        $color = mysqli_fetch_assoc($result_color);

        // Use the retrieved information as needed for your further processing
        // For example, you can store them in variables for later use
        $added_component_id = $component['added_component_id'];
        $component_name = $component['component_name'];
        $color_id_at_added_component = $component['color_id'];
        $color_name_at_added_component = $color['color_name'];

        // Prepare a response array
        $response = array(
            'success' => true,
            'message' => 'Color updated successfully',
            'data' => array(
                'added_component_id' => $added_component_id,
                'component_name' => $component_name,
                'color_id_at_added_component' => $color_id_at_added_component,
                'color_name_at_added_component' => $color_name_at_added_component
            )
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);

        // You can perform additional actions or redirect as needed
        // For example, redirect back to the game dashboard with a success message
        header("Location: game_dashboard.php?game_id=$game_id&success=true");
        exit();
    } else {
        echo "Error updating color: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
