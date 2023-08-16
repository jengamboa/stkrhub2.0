<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_with_colors'])) {

    $component_id = $_POST['component_id'];
    $selected_color_id = $_POST['selected_color'];
    $selected_size = $_POST['selected_size']; // Include size

    // Assuming you have the user ID stored in the session
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['game_id']) && $_POST['game_id'] !== '') {
        $game_id = $_POST['game_id'];

        echo "This is inside of a game";

        // Insert the color and size information into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id, size, user_id) 
                     VALUES ('$game_id', '$component_id', '$selected_color_id', '$selected_size', '$user_id')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            // Color and size information added successfully, redirect to game dashboard
            header("Location: game_dashboard.php?game_id=$game_id");
            exit;
        } else {
            echo "Error inserting color and size information: " . mysqli_error($conn) . "<br>";
        }

    } else {
        echo "It is a single game component";

        // Insert the single game component into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id, size, user_id) 
                     VALUES (NULL, '$component_id', '$selected_color_id', '$selected_size', '$user_id')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            echo "Single game component inserted successfully.";
        } else {
            echo "Error inserting single game component: " . mysqli_error($conn);
        }
    }
}
?>