<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];

    $sqlGetPendingPublishRequest = "SELECT * FROM games WHERE game_id = $game_id";
    $queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
    while ($fetchedGames = $queryGetPendingPublishRequest->fetch_assoc()) {
        $name = $fetchedGames['name'];
        $description = $fetchedGames['description'];
        $user_id = $fetchedGames['user_id'];
        $created_at = $fetchedGames['created_at'];
        $is_built = $fetchedGames['is_built'];
        $is_pending = $fetchedGames['is_pending'];
        $to_approve = $fetchedGames['to_approve'];
        $is_denied = $fetchedGames['is_denied'];
        $is_approved = $fetchedGames['is_approved'];
    }

    // SQL query to retrieve added components and their prices for a specific game
    $sqlComponents = "SELECT 
    agc.added_component_id,
    agc.quantity,
    gc.price
    FROM added_game_components AS agc
    INNER JOIN game_components AS gc ON agc.component_id = gc.component_id
    WHERE agc.game_id = $game_id";

    $resultComponents = $conn->query($sqlComponents);

    $totalPrice = 0;

    while ($fetchedComponents = $resultComponents->fetch_assoc()) {
        $quantity = $fetchedComponents['quantity'];
        $price = $fetchedComponents['price'];

        // Calculate the total price for this added component
        $componentTotalPrice = $quantity * $price;

        // Add the component's total price to the game's total price
        $totalPrice += $componentTotalPrice;
    }

    // Update the 'is_built' flag in the 'games' table
    $sqlUpdateIsBuilt = "UPDATE games SET is_built = 1 WHERE game_id = $game_id";
    $conn->query($sqlUpdateIsBuilt);

    // Insert a record into the 'built_games' table
    $sqlInsertBuiltGame = "INSERT INTO built_games (game_id, name, description, creator_id, is_pending, is_canceled, is_approved, is_purchased, is_published, price)
            VALUES ($game_id, '$name', '$description', $user_id, 0, 0, 1, 0, 0, $totalPrice)";
    $conn->query($sqlInsertBuiltGame);

    $built_game_id = mysqli_insert_id($conn);

    // Retrieve added game components based on the game_id from added_game_components table
    $select_components_query = "SELECT * FROM added_game_components WHERE game_id = '$game_id'";
    $result_components = $conn->query($select_components_query);

    while ($component = mysqli_fetch_assoc($result_components)) {
        $component_id = $component['component_id'];
        $is_custom_design = $component['is_custom_design'];
        $custom_design_file_path = $component['custom_design_file_path'];
        $quantity = $component['quantity'];
        $color_id = $component['color_id'];
        $size = $component['size'];

        // Insert the component into built_games_added_game_components table
        $insert_component_query = "INSERT INTO built_games_added_game_components (built_game_id, game_id, component_id, is_custom_design, custom_design_file_path, quantity, color_id, size)
                VALUES ('$built_game_id', '$game_id', '$component_id', '$is_custom_design', '$custom_design_file_path', '$quantity', '$color_id', '$size')";
        $queryInsertComponentsBuilt = $conn->query($insert_component_query);
    }

    // Prepare a success response
    $response = array(
        'success' => true,
        'message' => 'Game successfully built',
    );

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
