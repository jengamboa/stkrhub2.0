<?php
include 'connection.php';
include 'html/header.html.php';

// Retrieve the component details from the database
$component_id = $_GET['component_id'];
$query = "SELECT * FROM game_components WHERE component_id = '$component_id'";
$result = mysqli_query($conn, $query);
$component = mysqli_fetch_assoc($result);

// Fetch the game ID and name from the URL
$game_id = $_GET['game_id'];
$game_name = urldecode($_GET['game_name']); // Decode the game name

// Retrieve the game details from the "games" table
$query = "SELECT * FROM games WHERE game_id = '$game_id' AND user_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$game = mysqli_fetch_assoc($result);

// Retrieve the component assets (images) from the component_assets table
$query_assets = "SELECT * FROM component_assets WHERE component_id = '$component_id'";
$result_assets = mysqli_query($conn, $query_assets);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Game Component Details</title>
</head>

<body>
    <h2>Game Component Details</h2>

    <!-- Display the game ID and game name -->
    <?php if (!empty($game_name)) { ?>
        <p>Game Name:
            <?php echo $game_name; ?>
        </p>
    <?php } ?>

    <!-- Display the component details -->
    <h3>
        <?php echo $component['component_name']; ?>
    </h3>

    <!-- Display description if available -->
    <?php if (!empty($component['description'])) { ?>
        <p>Description:
            <?php echo $component['description']; ?>
        </p>
    <?php } ?>

    <p>Price:
        <?php echo $component['price']; ?>
    </p>
    <p>Category:
        <?php echo $component['category']; ?>
    </p>
    <p>Size:
        <?php echo $component['size']; ?>
    </p>

    <!-- Display the component assets (images) -->
    <?php if (mysqli_num_rows($result_assets) > 0) { ?>
        <h4>Component Assets</h4>
        <ul>
            <?php while ($asset = mysqli_fetch_assoc($result_assets)) { ?>
                <li>
                    <img src="<?php echo $asset['asset_path']; ?>" alt="<?php echo $component['component_name']; ?>">
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>No assets available for this component.</p>
    <?php } ?>

    <!-- TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO: -->
    <?php if ($component['has_colors'] == 1) { ?>
        <h4>Color Options</h4>
        <!-- Display color picker or dropdown list here -->
        <form method="post" action="process_add_component_with_colors.php">
            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
            <input type="hidden" name="component_id" value="<?php echo $component_id; ?>">
            <input type="hidden" name="component_category" value="<?php echo $component['category']; ?>">
            <input type="hidden" name="component_name" value="<?php echo $component['component_name']; ?>">
            <input type="hidden" name="component_price" value="<?php echo $component['price']; ?>">
            <input type="hidden" name="selected_size" value="<?php echo $component['size']; ?>"> <!-- Include size -->

            <!-- Add a quantity input for color-selected component -->
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="1" min="1" required>

            <label for="selected_color">Select Color:</label>
            <select id="selected_color" name="selected_color">
                <?php
                // Retrieve the color options for the component from the component_colors table
                $query_colors = "SELECT * FROM component_colors WHERE component_id = '$component_id'";
                $result_colors = mysqli_query($conn, $query_colors);
                while ($color = mysqli_fetch_assoc($result_colors)) {
                    echo '<option value="' . $color['color_id'] . '">' . $color['color_name'] . '</option>';
                }
                ?>
            </select>

            <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
            <input type="hidden" name="component_name" value="<?php echo $component['component_name']; ?>">

            <input type="submit" name="add_with_colors" value="Add with Colors">dice
        </form>
    <?php } else { ?>
        <!-- TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO: -->


        <!-- Button to add the component with design -->
        <form method="post" action="upload_custom_design.php">
            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
            <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
            <input type="hidden" name="component_id" value="<?php echo $component_id; ?>">
            <input type="hidden" name="component_name" value="<?php echo $component['component_name']; ?>">
            <input type="hidden" name="component_price" value="<?php echo $component['price']; ?>">
            <input type="hidden" name="component_category" value="<?php echo $component['category']; ?>">
            <input type="hidden" name="selected_size" value="<?php echo $component['size']; ?>"> <!-- Include size -->


            <input type="submit" name="add_with_design" value="Add with Design">
        </form>


        <!-- Button to add the component without design -->
        <form method="post" action="process_direct_add_component.php">
            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
            <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
            <input type="hidden" name="component_id" value="<?php echo $component_id; ?>">
            <input type="hidden" name="component_name" value="<?php echo $component['component_name']; ?>">
            <input type="hidden" name="component_price" value="<?php echo $component['price']; ?>">
            <input type="hidden" name="component_category" value="<?php echo $component['category']; ?>">
            <input type="hidden" name="selected_size" value="<?php echo $component['size']; ?>"> <!-- Include size -->

            <!-- Quantity input -->
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">

            <input type="submit" name="direct_add" value="Add Directly without Design">
        </form>


        <!-- Dropdown to select and add other components based on the category -->
        <form method="post" action="process_navigate_size.php" id="componentForm">
            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
            <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">

            <!-- Display the component details -->
            <label for="select_component">Select Size:</label>
            <select id="select_component" name="selected_component_id">
                <?php
                // Retrieve the list of game components based on the selected category
                $query_category_components = "SELECT * FROM game_components WHERE category = '{$component['category']}'";
                $result_category_components = mysqli_query($conn, $query_category_components);
                while ($category_component = mysqli_fetch_assoc($result_category_components)) {
                    $selected = ($category_component['component_id'] == $component_id) ? 'selected' : '';
                    echo '<option value="' . $category_component['component_id'] . '" ' . $selected . '>' . $category_component['size'] . '</option>';
                }
                ?>
            </select>
        </form>



    <?php } ?>

    <form method="post" action="add_custom_component.php">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="hidden" name="game_name" value="<?php echo $game['name']; ?>">
        <input type="submit" name="add_custom_component" value="Go Back">
    </form>

    <script>
        // Redirect to navigate.php when an option is selected
        document.getElementById("select_component").addEventListener("change", function () {
            document.getElementById("componentForm").submit();
        });
    </script>

</body>

</html>