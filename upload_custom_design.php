<?php
include 'connection.php';
include 'html/header.html.php';

// Get the game ID and game name from the previous page
$game_id = $_POST['game_id'];
$game_name = $_POST['game_name'];

// Fetch the component ID from the previous page
$component_id = $_POST['component_id'];
$component_name = $_POST['component_name'];
$component_price = $_POST['component_price'];
$component_category = $_POST['component_category'];

// Retrieve the selected size from the previous page
$selected_size = $_POST['selected_size'];

// Retrieve the template files for the component from the database
$query_templates = "SELECT * FROM component_templates WHERE component_id = '$component_id'";
$result_templates = mysqli_query($conn, $query_templates);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload Custom Design</title>
</head>

<body>
    <h2>Upload Custom Design for <?php echo $game_name; ?></h2>

    <!-- Display the passed values -->
    <p>Game ID: <?php echo $game_id; ?></p>
    <p>Game Name: <?php echo $game_name; ?></p>
    <p>Component ID: <?php echo $component_id; ?></p>
    <p>Component Name: <?php echo $component_name; ?></p>
    <p>Component Price: <?php echo $component_price; ?></p>
    <p>Component Category: <?php echo $component_category; ?></p>
    <p>Selected Size: <?php echo $selected_size; ?></p> <!-- Display the selected size -->

    <!-- Form to upload custom design -->
    <form method="post" action="process_upload_custom_design.php" enctype="multipart/form-data">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
        <input type="hidden" name="component_id" value="<?php echo $component_id; ?>">
        <input type="hidden" name="selected_size" value="<?php echo $selected_size; ?>"> <!-- Pass the selected size -->

        <!-- Input to upload custom design file -->
        <label for="custom_design_file">Upload Custom Design:</label>
        <input type="file" id="custom_design_file" name="custom_design_file" required>
        <br>

        <!-- Button to submit the form -->
        <input type="submit" name="upload_design" value="Upload Design">
    </form>

    <!-- Display template files -->
    <h3>Component Template Files</h3>
    <?php if (mysqli_num_rows($result_templates) > 0) { ?>
        <table>
            <tr>
                <th>Template Name</th>
                <th>Download Link</th>
            </tr>
            <?php while ($template = mysqli_fetch_assoc($result_templates)) { ?>
                <tr>
                    <td><?php echo $template['template_name']; ?></td>
                    <td><a href="<?php echo $template['template_file_path']; ?>" download>Download</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No template files available for this component.</p>
    <?php } ?>

</body>

</html>
