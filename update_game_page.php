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

    $built_game_id = $_GET['built_game_id'];
    $published_game_id = $_GET['published_game_id'];

    echo 'built game id: ' . $built_game_id . '<br>';
    echo 'published game id: ' . $published_game_id . '<br>';

    $query = "SELECT * FROM pending_update_published_built_games WHERE published_game_id = '$published_game_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $gameInfo = mysqli_fetch_assoc($result);
        // Echo the pending_published_built_game_id
        echo "Pending Published Built Game ID: " . $gameInfo['pending_published_game_id'];
    }
    ?>

    <form method="post" action="process_update_game.php" enctype="multipart/form-data">
        <input type="hidden" name="published_game_id" value="<?= $published_game_id ?>">
        <input type="hidden" name="built_game_id" value="<?= $built_game_id ?>">
        <input type="hidden" name="creator_id" value="<?= $gameInfo['creator_id'] ?>">

        <!-- Rest of your form inputs -->
        <label for="game_name">Final Publishing Game Name:</label><br>
        <input type="text" id="game_name" name="game_name" value="<?= $gameInfo['game_name'] ?>"><br>

        <label for="edition">Edition:</label><br>
        <input type="text" id="edition" name="edition" value="<?= $gameInfo['edition'] ?>"><br>

        <!-- number of players -->
        <label for="min_players">Number of Players (Minimum):</label><br>
        <input type="number" id="min_players" name="min_players" required value="<?= $gameInfo['min_players'] ?>"><br>

        <label for="max_players">Number of Players (Maximum):</label><br>
        <input type="number" id="max_players" name="max_players" required value="<?= $gameInfo['max_players'] ?>"><br>

        <!-- play time -->
        <label for="min_playtime">Play Time (Minimum):</label><br>
        <input type="number" id="min_playtime" name="min_playtime" required
            value="<?= $gameInfo['min_playtime'] ?>"><br>

        <label for="max_playtime">Play Time (Maximum):</label><br>
        <input type="number" id="max_playtime" name="max_playtime" required
            value="<?= $gameInfo['max_playtime'] ?>"><br>

        <!-- Age dropdown -->
        <label for="age">Age:</label><br>
        <select id="age" name="age">
            <?php
            // Retrieve age values from the Age table and populate the dropdown
            $ageQuery = "SELECT * FROM age";
            $ageResult = mysqli_query($conn, $ageQuery);

            while ($ageRow = mysqli_fetch_assoc($ageResult)) {
                $selected = ($ageRow['age_id'] == $gameInfo['age_id']) ? 'selected' : ''; // Check if this option is selected
                echo '<option value="' . $ageRow['age_id'] . '" ' . $selected . '>' . $ageRow['age_value'] . '</option>';
            }
            ?>
        </select><br>

        <!-- others -->
        <label for="short_description">Short Description:</label><br>
        <textarea id="short_description" name="short_description"
            required><?= $gameInfo['short_description'] ?></textarea><br>

        <label for="long_description">Long Description:</label><br>
        <textarea id="long_description" name="long_description"
            required><?= $gameInfo['long_description'] ?></textarea><br>

        <label for="website">Website:</label><br>
        <input type="url" id="website" name="website" value="<?= $gameInfo['website'] ?>"><br>

        <!-- Add the hidden input for Pending Published Built Game ID -->
        <input type="hidden" name="pending_published_game_id" value="<?= $gameInfo['pending_published_game_id'] ?>">

        <!-- LOGO -->
        <label for="placement_logo">Placement Logo:</label><br>
        <div id="placementLogoContainer">
            <?php
            $placementLogoFileName = $gameInfo['placement_logo_path'];
            echo '<img id="placementLogoImage" src="' . $placementLogoFileName . '" alt="Placement Logo">';
            ?>
        </div>
        <input type="file" id="logoInput" name="logo" onchange="redirectToUpdateLogo()">



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



        <button type="submit" name="update">Update Game</button>
    </form>

    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.min.js"></script>
    <script>
        function redirectToUpdateLogo() {
            const logoInput = document.getElementById('logoInput');
            const pendingPublishedGameID = document.querySelector('input[name="pending_published_game_id"]').value;

            // Check if a file has been selected
            if (logoInput.files.length > 0) {
                // Append the Pending Published Built Game ID to the URL
                const redirectURL = `process_update_placement_logo.php?pending_published_game_id=${encodeURIComponent(pendingPublishedGameID)}`;
                window.location.href = redirectURL;
            }
        }

        // Initialize FilePond for each individual input element
        const inputElements = document.querySelectorAll('input[type="file"].filepond');
        inputElements.forEach(inputElement => {
            FilePond.create(inputElement, {
                allowMultiple: false,
                allowReplace: true,
                allowRemove: true,
                allowBrowse: true,
                storeAsFile: true,
            });
        });
    </script>


</body>

</html>