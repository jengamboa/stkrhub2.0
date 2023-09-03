<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user input
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Prepare the SQL query with placeholders
    $insert_query = "INSERT INTO games (name, description, user_id) VALUES (?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $insert_query);

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssi", $name, $description, $_SESSION['user_id']);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Game created successfully, redirect to show_games.php
        header("Location: created_games_page.php");
        exit;
    } else {
        // Handle the error if the game creation fails
        echo "Error: " . mysqli_stmt_error($stmt);
        exit;
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
