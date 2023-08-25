<?php
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $finalGameName = $_POST['final_game_name'];
    $edition = $_POST['edition'];

    // Insert final game name into the "published_built_games" table
    $insertGameQuery = "INSERT INTO published_built_games (game_name, edition) VALUES ('$finalGameName', '$edition')";
    if (mysqli_query($conn, $insertGameQuery)) {
        echo "Final game name inserted successfully.";
    } else {
        echo "Error inserting final game name: " . mysqli_error($conn);
    }

    // Insert multiple files into the "published_multiple_files" table
    $uploadDirectory = "uploads/published_built_games/multiple/"; // Create a directory to store uploaded files
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    if (!empty($_FILES['multiple_files']['name'][0])) {
        foreach ($_FILES['multiple_files']['name'] as $key => $filename) {
            $tempFilePath = $_FILES['multiple_files']['tmp_name'][$key];
            $newFilePath = $uploadDirectory . $filename;

            if (move_uploaded_file($tempFilePath, $newFilePath)) {
                $insertFileQuery = "INSERT INTO published_multiple_files (file_name) VALUES ('$filename')";
                if (mysqli_query($conn, $insertFileQuery)) {
                    echo "File '$filename' uploaded and inserted successfully.<br>";
                } else {
                    echo "Error inserting file '$filename': " . mysqli_error($conn) . "<br>";
                }
            } else {
                echo "Error uploading file '$filename'.<br>";
            }
        }
    } else {
        echo "No files were uploaded.";
    }

} else {
    echo "Form not submitted.";
}
?>