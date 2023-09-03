<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['build_game'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $description = $_POST['description'];

    // Prepare and execute the insert query using prepared statements
    $insert_query = "INSERT INTO built_games (game_id, name, description, creator_id, build_date, is_pending, is_canceled, is_approved, is_purchased, is_published, price)
                     VALUES (?, ?, ?, ?, NOW(), 0, 0, 0, 0, 0, ?)";
    $stmt = mysqli_prepare($conn, $insert_query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "issss", $game_id, $game_name, $description, $user_id, $game_price);

    if (mysqli_stmt_execute($stmt)) {
        $built_game_id = mysqli_insert_id($conn); // Get the auto-generated built_game_id
        mysqli_stmt_close($stmt);

        // Redirect to process_build_game_2.php along with the data
        header("Location: process_build_game_2.php?user_id=$user_id&game_id=$game_id&game_name=$game_name&game_price=$game_price&description=$description&category=$category&built_game_id=$built_game_id");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>  