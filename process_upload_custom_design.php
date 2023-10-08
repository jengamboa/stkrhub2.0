<?php
session_start();
include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_design'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }

    $game_id = $_POST['game_id'];
    $component_id = $_POST['component_id'];
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



    echo $user_id . '<br>';
    echo 'game id: ' . $game_id . '<br>';
    echo $component_id . '<br>';
    echo $component_name . '<br>';
    echo $component_price . '<br>';
    echo $component_has_colors . '<br>';
    echo $component_size . '<br>';
    echo $quantity . '<br>';

    // Specify your destination directory
    $file_name = $_FILES['custom_design_file']['name'];
    $file_tmp = $_FILES['custom_design_file']['tmp_name'];

    // Generate a unique ID
    $unique_id = uniqid();

    // Combine the unique ID and original filename
    $new_file_name = $unique_id . '_' . $file_name;
    $file_dest = 'uploads/' . $new_file_name;

    echo $file_dest;


    echo $file_dest;


    if ($game_id == 0) {
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path, quantity, user_id)
                            VALUES (NULL, '$component_id', '$component_size', 1, '$file_dest', '$quantity', '$user_id')";

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
    } elseif ($game_id !== 0) {


        if (isset($_FILES['custom_design_file']) && $_FILES['custom_design_file']['error'] === UPLOAD_ERR_OK) {

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($file_tmp, $file_dest)) {
                // Insert the new component with custom design and quantity into the added_game_components table
                $insert_query = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path, quantity, user_id)
                                     VALUES ('$game_id', '$component_id', '$component_size', 1, '$file_dest', '$quantity', '$user_id')"; // is_custom_design = 1 for custom design'$user_id')"; // is_custom_design = 1 for custom design

                date_default_timezone_set('Asia/Manila');
                $currentTimestamp = date('Y-m-d H:i:s');
                $sqlUpdateDateModified = "UPDATE games SET date_modified = '$currentTimestamp' WHERE game_id = $game_id";
                if ($conn->query($sqlUpdateDateModified)) {
                    echo 'updated date modified';
                }
                
                if (mysqli_query($conn, $insert_query)) {
                    // Redirect back to the game dashboard after successful addition
                    header("Location: game_dashboard.php?game_id={$game_id}");
                    exit;
                }
            }
        }
    }
}
