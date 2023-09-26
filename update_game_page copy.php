<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample File Pond Server Implementation</title>

    <link href="https://unpkg.com/filepond@4.28.2/dist/filepond.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'connection.php';
    include 'html/header.html.php';

    $built_game_id = $_GET['built_game_id'];
    $published_game_id = $_GET['published_game_id'];

    // Retrieve the markup percentage from the database
    $query_markup = "SELECT percentage FROM markup_percentage";
    $result_markup = mysqli_query($conn, $query_markup);
    $markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

    $query = "SELECT built_game_id, game_id, creator_id, price, is_published FROM built_games WHERE built_game_id = '$built_game_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $gameInfo = mysqli_fetch_assoc($result);
    }

    // Fetch category data from the categories table
    $query_categories = "SELECT category_id, category_name FROM categories";
    $result_categories = mysqli_query($conn, $query_categories);

    // Check if there are categories available
    if (mysqli_num_rows($result_categories) > 0) {
        $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
    }
    
    echo 'built game id: ' . $built_game_id . '<br>';
    echo 'published game id: ' . $published_game_id . '<br>';
    ?>

    <!-- first panel -->
    <div>
        <?php
        // Query to retrieve current game information from published_built_games table
        $currentInfoQuery = "SELECT * FROM published_built_games WHERE published_game_id = '$published_game_id'";
        $currentInfoResult = mysqli_query($conn, $currentInfoQuery);

        if (mysqli_num_rows($currentInfoResult) > 0) {
            $currentGameInfo = mysqli_fetch_assoc($currentInfoResult);

            echo '<h2>Current Information</h2>';
            echo '<p>Published Game ID: ' . $currentGameInfo['published_game_id'] . '</p>';
            echo '<p>Built Game ID: ' . $currentGameInfo['built_game_id'] . '</p>';
            echo '<p>Game Name: ' . $currentGameInfo['game_name'] . '</p>';

            // Fetch the category_id from the published_built_games table
            $categoryID = $currentGameInfo['category'];

            // Query the categories table to retrieve the category_name
            $categoryQuery = "SELECT category_name FROM categories WHERE category_id = $categoryID";
            $categoryResult = mysqli_query($conn, $categoryQuery);
            $categoryRow = mysqli_fetch_assoc($categoryResult);
            $categoryName = $categoryRow['category_name'];

            // Echo the category_name
            echo '<p>Game Category: ' . $categoryName . '</p>';

            echo '<p>Edition: ' . $currentGameInfo['edition'] . '</p>';
            echo '<p>Published Date: ' . $currentGameInfo['published_date'] . '</p>';
            echo '<p>Creator ID: ' . $currentGameInfo['creator_id'] . '</p>';
            echo '<p>Age ID: ' . $currentGameInfo['age_id'] . '</p>';
            echo '<p>Short Description: ' . $currentGameInfo['short_description'] . '</p>';
            echo '<p>Long Description: ' . $currentGameInfo['long_description'] . '</p>';
            echo '<p>Website: ' . $currentGameInfo['website'] . '</p>';
            echo '<p>Logo Path: ' . $currentGameInfo['logo_path'] . '</p>';
            echo '<p>Minimum Players: ' . $currentGameInfo['min_players'] . '</p>';
            echo '<p>Maximum Players: ' . $currentGameInfo['max_players'] . '</p>';
            echo '<p>Minimum Playtime: ' . $currentGameInfo['min_playtime'] . '</p>';
            echo '<p>Maximum Playtime: ' . $currentGameInfo['max_playtime'] . '</p>';

            echo '<p>desired_markup: ' . $currentGameInfo['desired_markup'] . '</p>';
            echo '<p>manufacturer_profit: ' . $currentGameInfo['manufacturer_profit'] . '</p>';
            echo '<p>creator_profit: ' . $currentGameInfo['creator_profit'] . '</p>';
            echo '<p>marketplace_price: ' . $currentGameInfo['marketplace_price'] . '</p>';
        } else {
            echo '<p>No information found for the provided published game ID.</p>';
        }
        ?>

        <!-- Display game images associated with the published game ID -->
        <?php
        $imageQuery = "SELECT * FROM published_multiple_files WHERE published_built_game_id = '$published_game_id'";
        $imageResult = mysqli_query($conn, $imageQuery);

        echo '<h2>Game Images</h2>';
        while ($imageRow = mysqli_fetch_assoc($imageResult)) {
            $imagePath = $imageRow['file_path'];
            echo '<img src="' . $imagePath . '" alt="Game Image">';
        }
        ?>
    </div>

    <!-- second panel -->
    <div>
        <form method="post" action="process_update_pending.php" enctype="multipart/form-data">

            <input type="hidden" name="published_built_game_id" value="<?php echo $published_game_id; ?>">
            <input type="hidden" name="built_game_id" value="<?php echo $built_game_id; ?>">
            <input type="hidden" name="creator_id" value="<?php echo $gameInfo['creator_id']; ?>">
            <!-- Add this line -->

            <!-- Rest of your form inputs -->

            <label for="game_name">Final Publishing Game Name:</label><br>
            <input type="text" id="game_name" name="game_name"><br>

            <label for="category">Category:</label><br>
            <select id="category" name="category" required>
                <option value="" disabled selected>Select a category</option>
                <?php
                // Loop through the categories and populate the dropdown
                foreach ($categories as $category) {
                    echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                }
                ?>
            </select><br>

            <label for="edition">Edition:</label><br>
            <input type="text" id="edition" name="edition"><br>

            <!-- number of players -->
            <label for="min_players">Number of Players (Minimum):</label><br>
            <input type="number" id="min_players" name="min_players" required><br>

            <label for="max_players">Number of Players (Maximum):</label><br>
            <input type="number" id="max_players" name="max_players" required><br>

            <!-- play time -->
            <label for="min_playtime">Play Time (Minimum):</label><br>
            <input type="number" id="min_playtime" name="min_playtime" required><br>

            <label for="max_playtime">Play Time (Maximum):</label><br>
            <input type="number" id="max_playtime" name="max_playtime" required><br>

            <!-- Age dropdown -->
            <label for="age">Age:</label><br>
            <select id="age" name="age">
                <?php
                // Retrieve age values from the Age table and populate the dropdown
                $ageQuery = "SELECT * FROM age";
                $ageResult = mysqli_query($conn, $ageQuery);

                while ($ageRow = mysqli_fetch_assoc($ageResult)) {
                    echo '<option value="' . $ageRow['age_id'] . '">' . $ageRow['age_value'] . '</option>';
                }
                ?>
            </select><br>

            <!-- others -->
            <label for="short_description">Short Description:</label><br>
            <textarea id="short_description" name="short_description" required></textarea><br>

            <label for="long_description">Long Description:</label><br>
            <textarea id="long_description" name="long_description" required></textarea><br>

            <label for="website">Website:</label><br>
            <input type="url" id="website" name="website"><br>

            <label for="logo">Logo:</label><br>
            <input type="file" class="filepond" name="logo" accept="image/*" required>

            <label for="game_images">Game Images:</label><br>
            <input type="file" class="filepond" name="game_images[]" multiple required>


            <div id="partitions">
                <p>Cost: <span id="cost">
                        <?php echo $gameInfo['price']; ?>
                    </span></p>

                <label for="desired_markup">Desired Markup:</label>
                <input type="number" name="desired_markup" id="desired_markup" required>

                <!-- Hidden input fields to store calculated values -->
                <label for="manufacturer_profit">STKR:</label>
                <input type="number" id="manufacturerProfitInput" name="manufacturer_profit" readonly>

                <label for="creator_profit">Creator:</label>
                <input type="number" id="creatorProfitInput" name="creator_profit" readonly>

                <label for="marketplace_price">Marketplace Price:</label>
                <input type="number" id="marketplacePriceInput" name="marketplace_price" readonly>
            </div>

            <br>

            <button type="submit" name="update">Publish Game</button>

        </form>
    </div>


    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.js"></script>
    <script>
        // Initialize FilePond with the specified settings
        const inputElement = document.querySelector('input[name="logo"]');
        const pond = FilePond.create(inputElement, {
            allowMultiple: false, // Each input handles a single file
            allowReplace: true,
            allowRemove: true,
            allowBrowse: true,
            storeAsFile: true,
            required: true
        });

        // Initialize FilePond for the game images input
        const imageInput = document.querySelector('input[name="game_images[]"]');
        const imagePond = FilePond.create(imageInput, {
            allowMultiple: true, // Allow multiple files to be uploaded
            allowReplace: true,
            allowRemove: true,
            allowBrowse: true,
            storeAsFile: true,
            required: true,
            maxFiles: 10,
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Get the initial cost from PHP variable
        var cost = <?php echo $gameInfo['price']; ?>;
        var markupPercentage = <?php echo $markup_percentage; ?>; // Get the markup percentage

        // Set up event listener for desired markup change
        $('#desired_markup').on('input', function () {
            var desiredMarkup = parseFloat($(this).val()); // Parse the input value as a float

            // STKR Hub
            var manufacturerProfit = desiredMarkup * (markupPercentage / 100);
            $('#manufacturerProfit').text(manufacturerProfit.toFixed(2));

            // Creator
            var creatorProfit = desiredMarkup * ((100 - markupPercentage) / 100);
            $('#creatorProfit').text(creatorProfit.toFixed(2));

            // Marketplace Price
            var marketplacePrice = desiredMarkup + cost;
            $('#marketplacePrice').text(marketplacePrice.toFixed(2));

            // Update the hidden input fields with calculated values
            $('#manufacturerProfitInput').val(manufacturerProfit.toFixed(2));
            $('#creatorProfitInput').val(creatorProfit.toFixed(2));
            $('#marketplacePriceInput').val(marketplacePrice.toFixed(2));
        });

    </script>
</body>

</html>