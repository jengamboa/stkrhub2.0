<?php
include 'connection.php';
include 'html/header.html.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_design'])) {
    // Get the game ID, component ID, and size from the form data

    $component_price = $_POST['component_price'];
    
    
    $component_id = $_POST['component_id'];
    $selected_size = $_POST['selected_size'];
    $quantity = $_POST['quantity']; // Include quantity

    // Assuming you have the user ID stored in the session
    $user_id = $_SESSION['user_id'];

    // Specify your destination directory
    $file_name = $_FILES['custom_design_file']['name'];
    $file_tmp = $_FILES['custom_design_file']['tmp_name'];
    $file_dest = 'uploads/' . $file_name;

    // Check if game_id exists (it's part of a game) or not
    if (isset($_POST['game_id']) && $_POST['game_id'] !== '') {
        $game_id = $_POST['game_id'];
        $game_name = $_POST['game_name'];
        $component_category = $_POST['component_category'];
        $component_name = $_POST['component_name'];
        
        
        // Handle file upload here

        // Example code to handle file upload and save the file
        if (isset($_FILES['custom_design_file']) && $_FILES['custom_design_file']['error'] === UPLOAD_ERR_OK) {

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($file_tmp, $file_dest)) {
                // Insert the new component with custom design and quantity into the added_game_components table
                $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path, quantity, user_id)
                             VALUES ('$game_id', '$component_id', '$selected_size', 1, '$file_dest', '$quantity', '$user_id')"; // is_custom_design = 1 for custom design'$user_id')"; // is_custom_design = 1 for custom design

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

        // You can include additional code for handling game-related scenarios here
    } else {
        echo "It is a single game component.<br>";

        $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path, user_id)
                             VALUES (NULL, '$component_id', '$selected_size', 1, '$file_dest', '$user_id')";

        if (mysqli_query($conn, $insert_query)) {
            echo "Single game component inserted successfully.";

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
            echo "Error inserting single game component: " . mysqli_error($conn);
        }
    }
}
?>