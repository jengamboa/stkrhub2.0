<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['built_game_id'])) {
    $built_game_id = $_POST['built_game_id'];

    // Retrieve details of the canceled built game
    $query_canceled_game = "SELECT * FROM built_games WHERE built_game_id = '$built_game_id' AND is_canceled = 1";
    $result_canceled_game = mysqli_query($conn, $query_canceled_game);

    echo '<div class="panel">';
    if (mysqli_num_rows($result_canceled_game) > 0) {
        $game = mysqli_fetch_assoc($result_canceled_game);
        echo '<h2>Review Built Game</h2>';
        echo 'Built Game ID: ' . $game['built_game_id'] . '<br>';
        echo 'Game ID: ' . $game['game_id'] . '<br>';
        echo 'Name: ' . $game['name'] . '<br>';
        echo 'Description: ' . $game['description'] . '<br>';
        echo 'Creator ID: ' . $game['creator_id'] . '<br>';
        echo 'Build Date: ' . $game['build_date'] . '<br>';
        echo 'Is Pending: ' . ($game['is_pending'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Canceled: ' . ($game['is_canceled'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Approved: ' . ($game['is_approved'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Purchased: ' . ($game['is_purchased'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Published: ' . ($game['is_published'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Price: $' . $game['price'] . '<br>';
    } else {
        echo '<h2>Review Built Game</h2>';
        echo 'No information available.';
    }
    echo '</div>';

    // Fetch and display admin review responses
    $query_admin_responses = "SELECT * FROM admin_review_response WHERE built_game_id = '$built_game_id' ORDER BY response_date ASC";
    $result_admin_responses = mysqli_query($conn, $query_admin_responses);

    echo '<div class="panel">';
    echo '<h2>Admin Review Responses</h2>';
    if (mysqli_num_rows($result_admin_responses) > 0) {
        echo '<ul>';
        while ($response = mysqli_fetch_assoc($result_admin_responses)) {
            echo '<li>';
            echo 'Admin Review Response ID: ' . $response['admin_review_response_id'] . '<br>';
            echo 'Game ID: ' . $response['game_id'] . '<br>';

            // Display a download link for the admin file upload
            if (!empty($response['admin_file_upload'])) {
                echo 'Admin File Upload: <a href="' . $response['admin_file_upload'] . '" download>' . $response['admin_file_upload'] . '</a><br>';
            } else {
                echo 'Admin File Upload: N/A<br>';
            }

            echo 'Admin Text Response: ' . $response['admin_text_response'] . '<br>';
            echo 'Response Date: ' . $response['response_date'] . '<br>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No admin review responses available.';
    }
    echo '</div>';


    // User Response Panel
    echo '<div class="panel">';
    echo '<h2>User Response</h2>';
    echo '<form action="process_petition.php" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="built_game_id" value="' . $built_game_id . '">';
    echo '<label for="user_text_response">Text Response:</label>';
    echo '<input type="text" name="user_text_response" id="user_text_response"><br>';
    echo '<label for="user_file_upload">File Upload:</label>';
    echo '<input type="file" name="user_file_upload" id="user_file_upload"><br>';
    echo '<button type="submit" name="petition">Petition</button>';
    echo '</form>';
    echo '</div>';

}
?>