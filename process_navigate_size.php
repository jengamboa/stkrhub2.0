

<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['value']) && isset($_POST['game_id'])) {
        $select_component_id = $_POST['value'];
        $game_id = $_POST['game_id'];

        echo "Selected value: " . $select_component_id;
        echo "Game ID received: " . $game_id; 
    }
}
?>