<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['petition'])) {
    // Retrieve form data
    $built_game_id = $_POST['built_game_id'];
    $user_text_response = $_POST['user_text_response'];

    // Handle file upload
    $user_file_upload = null;
    if (isset($_FILES['user_file_upload']) && $_FILES['user_file_upload']['error'] === UPLOAD_ERR_OK) {
        $upload_directory = 'uploads/response/user/';
        $user_file_upload = $upload_directory . $_FILES['user_file_upload']['name'];
        move_uploaded_file($_FILES['user_file_upload']['tmp_name'], $user_file_upload);
    }

    // Update is_canceled and is_pending in built_games table
    $update_query = "UPDATE built_games SET is_canceled = 0, is_pending = 1 WHERE built_game_id = '$built_game_id'";
    mysqli_query($conn, $update_query);

    // Insert data into user_review_response table
    $insert_query = "INSERT INTO user_review_response (built_game_id, user_file_upload, user_text_response, response_date)
                     VALUES ('$built_game_id', '$user_file_upload', '$user_text_response', NOW())"; // Replace '123' with actual game_id

    if (mysqli_query($conn, $insert_query)) {
        echo "Petition submitted successfully.";
        header("Location: pending_built_games_page.php"); // Redirect to the pending page
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>