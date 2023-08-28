<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample File Pond Server Implementation</title>

    <!-- Filepond Css -->
    <link href="https://unpkg.com/filepond@4.28.2/dist/filepond.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'connection.php';
    include 'html/header.html.php';

    $built_game_id = $_GET['built_game_id']; // Retrieve the built_game_id from the URL parameter
    
    $query = "SELECT built_game_id, game_id, creator_id, price, is_published FROM built_games WHERE built_game_id = '$built_game_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $gameInfo = mysqli_fetch_assoc($result);

        echo '<h2>Edit Game Page</h2>';
        echo '<p>Built Game ID: ' . $gameInfo['built_game_id'] . '</p>';
        echo '<p>Game ID: ' . $gameInfo['game_id'] . '</p>';
        echo '<p>Creator ID: ' . $gameInfo['creator_id'] . '</p>';
        echo '<p>Price: $' . $gameInfo['price'] . '</p>';

        // Echo the value of the is_published column
        echo '<p>Is Published: ' . ($gameInfo['is_published'] == 1 ? 'Yes' : 'No') . '</p>';

        // Redirect if is_published is equal to 1
        if ($gameInfo['is_published'] == 1) {
            header("Location: purchased_built_games_page.php");
            exit;
        }

        // Display the rest of your form
        // ...
    } else {
        echo '<p>No information found for the provided built game ID.</p>';
    }

    ?>
    <!-- <form method="post" action="dump_process.php" enctype="multipart/form-data"> -->
    <form method="post" action="process_publish_built_game.php" enctype="multipart/form-data">

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
        <textarea id="short_description" name="short_description" required></textarea><br>

        <label for="long_description">Long Description:</label><br>
        <textarea id="long_description" name="long_description" required></textarea><br>

        <label for="website">Website:</label><br>
        <input type="url" id="website" name="website"><br>

        <label for="logo">Game Logo:</label><br>
        <input type="file" id="logo" name="logo" required><br>

        <div id="fileContainer">
            <!-- Multiple -->
            <label for="order_position_1">File 1:</label>
            <input type="file" id="order_position_1" name="multiple_files[]" class="filepond" required><br>

            <label for="order_position_2">File 2:</label>
            <input type="file" id="order_position_2" name="multiple_files[]" class="filepond" required><br>

            <label for="order_position_3">File 3:</label>
            <input type="file" id="order_position_3" name="multiple_files[]" class="filepond" required><br>

            <label for="order_position_4">File 4:</label>
            <input type="file" id="order_position_4" name="multiple_files[]" class="filepond"><br>

            <label for="order_position_5">File 5:</label>
            <input type="file" id="order_position_5" name="multiple_files[]" class="filepond"><br>

            <label for="order_position_6">File 6:</label>
            <input type="file" id="order_position_6" name="multiple_files[]" class="filepond"><br>

            <label for="order_position_7">File 7:</label>
            <input type="file" id="order_position_7" name="multiple_files[]" class="filepond"><br>

            <label for="order_position_8">File 8:</label>
            <input type="file" id="order_position_8" name="multiple_files[]" class="filepond"><br>

            <label for="order_position_9">File 9:</label>
            <input type="file" id="order_position_9" name="multiple_files[]" class="filepond"><br>

            <label for="order_position_10">File 10:</label>
            <input type="file" id="order_position_10" name="multiple_files[]" class="filepond"><br>
        </div>

        <!-- Repeat for files 3 to 10 -->

        <button type="submit" name="update">Publish Game</button>

    </form>

    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.min.js"></script>
    <script>

        // Initialize FilePond for each individual input element
        const inputElements = document.querySelectorAll('input[type="file"].filepond');
        inputElements.forEach(inputElement => {
            FilePond.create(inputElement, {
                allowMultiple: false, // Each input handles a single file
                allowReplace: true,
                allowRemove: true,
                allowBrowse: true,
                storeAsFile: true,
                // required: true,
            });
        });

    </script>




</body>

</html>