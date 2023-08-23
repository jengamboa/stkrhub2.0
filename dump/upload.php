<?php
// upload.php
include 'connection.php';

$folder_name = 'upload/';

// Get the game name from the form
$game_name = $_POST['gameName'];

// Insert game name into the game table
$query = "INSERT INTO game (game_name) VALUES (?)";
$stmt = mysqli_prepare($_SESSION['db_connection'], $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $game_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
} else {
    echo "Database error: " . mysqli_error($_SESSION['db_connection']);
}

if (!empty($_FILES)) {
    $original_filename = $_FILES['file']['name'];
    $file_extension = pathinfo($original_filename, PATHINFO_EXTENSION);

    // Generate a unique filename
    $unique_filename = uniqid() . '_' . $original_filename;

    $temp_file = $_FILES['file']['tmp_name'];
    $location = $folder_name . $unique_filename;

    // Move the uploaded file to the desired location
    move_uploaded_file($temp_file, $location);

    // Insert file information into the uploaded_files table
    $query = "INSERT INTO uploaded_files (original_filename, unique_filename, upload_date) VALUES (?, ?, NOW())";
    $stmt = mysqli_prepare($_SESSION['db_connection'], $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $original_filename, $unique_filename);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "Database error: " . mysqli_error($_SESSION['db_connection']);
    }
}


