<?php
include 'connection.php'; // Include your database connection

if (isset($_POST['pending_published_id']) && isset($_FILES['new_logo'])) {
    $pending_published_id = $_POST['pending_published_id'];
    $targetDirectory = 'uploads/published_built_games/logos/';
    $logoPath = $targetDirectory . uniqid() . '_' . basename($_FILES['new_logo']['name']);
    $placementsDirectory = 'uploads/published_built_games/logos/placements/';
    $placementLogoPath = $placementsDirectory . basename($logoPath); // Use the same file name for placement

    // Update the placement_logo_path column in pending_update_published_built_games
    $updateQuery = "UPDATE pending_update_published_built_games SET placement_logo_path = '$placementLogoPath' WHERE pending_published_game_id = '$pending_published_id'";

    if (mysqli_query($conn, $updateQuery)) {
        // Move the uploaded logo to the desired directory
        if (move_uploaded_file($_FILES['new_logo']['tmp_name'], $logoPath)) {
            // Move the logo to placements directory
            if (copy($logoPath, $placementLogoPath)) {
                // Delete the logo from the original directory
                unlink($logoPath);
                echo "Placement Logo Path updated, logo file moved to placements directory, and original logo removed successfully.<br>";
                echo "Pending Published ID: $pending_published_id<br>";
                echo "Placement Logo Path: $placementLogoPath";
            } else {
                echo "Error moving logo to placements directory.";
            }
        } else {
            echo "Error moving logo file.";
        }
    } else {
        echo "Error updating Placement Logo Path: " . mysqli_error($conn);
    }
} else {
    echo "No pending_published_id provided or no logo file uploaded.";
}
?>