<?php
// Check if a file was uploaded
if (isset($_FILES['newFile']) && $_FILES['newFile']['error'] === UPLOAD_ERR_OK) {
    // Define the upload directory
    $uploadDir = 'uploads/'; // Change this to your desired directory

    // Generate a unique filename to prevent overwriting
    $newFileName = uniqid() . '_' . $_FILES['newFile']['name'];

    // Define the full path to store the uploaded file
    $uploadPath = $uploadDir . $newFileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['newFile']['tmp_name'], $uploadPath)) {
        // Update the database record with the new file path
        $added_component_id = $_POST['added_component_id'];

        // Connect to your database (modify with your database connection code)
        include 'connection.php';

        // Get the current custom design file path and component_id
        $sql = "SELECT custom_design_file_path, component_id FROM added_game_components WHERE added_component_id = $added_component_id";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentFilePath = $row['custom_design_file_path'];
            $component_id = $row['component_id'];
        
            // Update the custom_design_file_path column in the added_game_components table
            $updateSql = "UPDATE added_game_components SET custom_design_file_path = '$uploadPath' WHERE added_component_id = $added_component_id";
        
            if ($conn->query($updateSql) === TRUE) {
                // Update successful
                $response = array(
                    'success' => true,
                    'message' => 'Custom design updated successfully.',
                    'current_file' => $currentFilePath,
                    'new_file' => $newFileName,
                    'game_id' => $_POST['game_id'],
                    'component_id' => $component_id
                );
            } else {
                // Update failed
                $response = array(
                    'success' => false,
                    'message' => 'Failed to update custom design.'
                );
            }
        } else {
            // No record found
            $response = array(
                'success' => false,
                'message' => 'No record found for the specified added_component_id.'
            );
        }

        // Close the database connection
        $conn->close();
    } else {
        // File upload failed
        $response = array(
            'success' => false,
            'message' => 'Failed to upload the new file.'
        );
    }
} else {
    // No file was uploaded
    $response = array(
        'success' => false,
        'message' => 'No file was uploaded.'
    );
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
