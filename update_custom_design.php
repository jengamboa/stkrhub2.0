<?php
include 'connection.php';
include 'html/header.html.php';

// Get the passed parameters from the URL
$game_id = $_GET['game_id'];
$game_name = $_GET['game_name'];
$component_id = $_GET['component_id'];
$component_name = $_GET['component_name'];
$component_price = $_GET['component_price'];
$component_category = $_GET['component_category'];
$file_path = $_GET['file_path'];
$file_name = $_GET['file_name'];
$added_component_id = $_GET['added_component_id'];

// Define the target directory to upload the file
$targetDir = 'uploads/';

// Handle file upload if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the uploaded file
    $uploadedFile = $_FILES['new_file'];

    // Check if a file was uploaded
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $newFileName = $targetDir . basename($uploadedFile['name']);
        // Move the uploaded file to the target directory
        if (move_uploaded_file($uploadedFile['tmp_name'], $newFileName)) {
            // Update the custom design file path in the database
            $updateQuery = "UPDATE added_game_components SET custom_design_file_path = '$newFileName' WHERE added_component_id = '$added_component_id'";
            mysqli_query($conn, $updateQuery);
            
            // Redirect back to the game dashboard after successful upload
            header("Location: game_dashboard.php?game_id=$game_id");
            exit;
        } else {
            echo "Error uploading file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Custom Design</title>
</head>

<body>
    <h2>Update Custom Design</h2>

    <p>Game ID: <?php echo $game_id; ?></p>
    <p>Game Name: <?php echo $game_name; ?></p>
    <p>Component ID: <?php echo $component_id; ?></p>
    <p>Component Name: <?php echo $component_name; ?></p>
    <p>Component Price: <?php echo $component_price; ?></p>
    <p>Component Category: <?php echo $component_category; ?></p>
    <p>Current File Path: <?php echo $file_path; ?></p>

    <!-- Form for updating custom design file -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
        <input type="hidden" name="component_id" value="<?php echo $component_id; ?>">
        <input type="hidden" name="component_name" value="<?php echo $component_name; ?>">
        <input type="hidden" name="component_price" value="<?php echo $component_price; ?>">
        <input type="hidden" name="component_category" value="<?php echo $component_category; ?>">
        <input type="hidden" name="added_component_id" value="<?php echo $added_component_id; ?>">
        <label for="new_file">Upload New File:</label>
        <input type="file" name="new_file" id="new_file">
        <input type="submit" name="submit" value="Upload">
    </form>

    <!-- Link to go back to the game dashboard -->
    <a href="game_dashboard.php?game_id=<?php echo $game_id; ?>">Go Back</a>
</body>

</html>
