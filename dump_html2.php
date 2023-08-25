<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample File Pond Server Implementation</title>
    <!-- Filepond Css -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css">
</head>

<body>
    <?php
    include 'connection.php';
    include 'html/header.html.php';

    $built_game_id = $_GET['built_game_id']; // Retrieve the built_game_id from the URL parameter
    
    $query = "SELECT built_game_id, game_id, creator_id, price FROM built_games WHERE built_game_id = '$built_game_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $gameInfo = mysqli_fetch_assoc($result);

        echo '<h2>Edit Game Page</h2>';
        echo '<p>Built Game ID: ' . $gameInfo['built_game_id'] . '</p>';
        echo '<p>Game ID: ' . $gameInfo['game_id'] . '</p>';
        echo '<p>Creator ID: ' . $gameInfo['creator_id'] . '</p>';
        echo '<p>Price: $' . $gameInfo['price'] . '</p>';

        // Display the rest of your form
        // ...
    } else {
        echo '<p>No information found for the provided built game ID.</p>';
    }

    ?>
    <form method="post" action="dump_process.php" enctype="multipart/form-data">
        <!-- <form method="post" action="process_publish_built_game.php" enctype="multipart/form-data"> -->

        <input type="hidden" name="built_game_id" value="<?php echo $built_game_id; ?>">
        <input type="hidden" name="creator_id" value="<?php echo $gameInfo['creator_id']; ?>">
        <!-- Add this line -->

        <!-- Rest of your form inputs -->

        <label for="game_name">Final Publishing Game Name:</label><br>
        <input type="text" id="game_name" name="game_name"><br>

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
        <textarea id="short_description" name="short_description"></textarea><br>

        <label for="long_description">Long Description:</label><br>
        <textarea id="long_description" name="long_description"></textarea><br>

        <label for="website">Website:</label><br>
        <input type="url" id="website" name="website"><br>

        <label for="logo">Game Logo:</label><br>
        <input type="file" id="logo" name="logo" required><br>

        <label for="graphics">Game Graphics:</label><br>
        <input type="file" name="graphics[]" id="imagesFilepond" class="filepond" multiple data-allow-reorder="true"
            data-max-file-size="30MB"><br>

        <button type="submit" name="update">Publish Game</button>
    </form>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
        </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
    </script>

    <script>

    </script>
</body>

</html>