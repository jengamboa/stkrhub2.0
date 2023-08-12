<?php
include 'connection.php';

// Get the game ID, component ID, and size from the form data
$game_id = $_POST['game_id'];
$component_id = $_POST['component_id'];
$selected_size = $_POST['selected_size'];

// Process the uploaded custom design file if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_design'])) {
    // Handle file upload here

    // Example code to handle file upload and save the file
    if (isset($_FILES['custom_design_file']) && $_FILES['custom_design_file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['custom_design_file']['name'];
        $file_tmp = $_FILES['custom_design_file']['tmp_name'];
        $file_dest = 'uploads/' . $file_name; // Specify your destination directory

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file_tmp, $file_dest)) {
            // Insert the new component with custom design into the added_game_components table
            $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path)
                             VALUES ('$game_id', '$component_id', '$selected_size', 1, '$file_dest')"; // is_custom_design = 1 for custom design

            if (mysqli_query($conn, $insert_query)) {
                // Redirect back to the game dashboard after successful addition
                header("Location: game_dashboard.php?game_id={$game_id}");
                exit;
            } else {
                // Handle the error if the insert fails
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
                exit;
            }
        } else {
            // Handle file upload error
            echo "Error uploading file.";
            exit;
        }
    }
}
?>
