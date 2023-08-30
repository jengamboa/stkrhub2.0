<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games with Pending Updates</title>
</head>

<body>
    <?php
    include '../connection.php';
    include '../html/header.html.php';

    // Retrieve published games with pending updates
    $query = "SELECT published_game_id, game_name FROM published_built_games WHERE has_pending_update = 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($gameInfo = mysqli_fetch_assoc($result)) {
            // Display game information
            echo '<div>';
            echo '<a href="pending_update_details_page.php?published_game_id=' . $gameInfo['published_game_id'] . '">';
            echo 'Published Game ID: ' . $gameInfo['published_game_id'] . '<br>';
            echo 'Game Name: ' . $gameInfo['game_name'] . '<br>';
            echo '</a>';
            echo '</div>';
            echo '<br>';
        }
    } else {
        echo 'No games with pending updates.';
    }
    ?>

</body>

</html>