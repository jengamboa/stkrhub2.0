<?php
session_start();
include 'connection.php';
include 'html/page_header2.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Built Games</title>

    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/font-awesome.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/themify-icons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/owl.carousel.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nice-select.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nouislider.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/ion.rangeSlider.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/magnific-popup.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

</head>

<body>


    <br><br><br>

    <h2>Built Games</h2>
    <ul>
        <?php
        // Select built games based on the logged-in user
        $query = "SELECT * FROM built_games WHERE creator_id = '$user_id'";
        $result = mysqli_query($conn, $query);

        while ($game = mysqli_fetch_assoc($result)) {
            echo '<div class="game-details">';
            echo '<a href="game_components.php?built_game_id=' . $game['built_game_id'] . '">';

            echo '<h3>Built Game ID: ' . $game['built_game_id'] . '</h3>';
            echo '<p>Name: ' . $game['name'] . '</p>';
            echo 'Description: ' . $game['description'] . '<br>';
            // ... Display other details ...
            echo 'Creator ID: ' . $game['creator_id'] . '<br>';
            echo 'Build Date: ' . $game['build_date'] . '<br>';
            echo 'Is Pending: ' . ($game['is_pending'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Canceled: ' . ($game['is_canceled'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Approved: ' . ($game['is_approved'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Purchased: ' . ($game['is_purchased'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Published: ' . ($game['is_published'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Price: $' . $game['price'] . '<br>';

            if ($game['is_pending'] != 1 && $game['is_approved'] != 1) {
                echo '<form method="post" action="process_get_approved.php">';
                echo '<input type="hidden" name="built_game_id" value="' . $game['built_game_id'] . '">';
                echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                echo '<input type="hidden" name="name" value="' . $game['name'] . '">';
                echo '<input type="hidden" name="description" value="' . $game['description'] . '">';
                echo '<input type="hidden" name="creator_id" value="' . $game['creator_id'] . '">';
                echo '<input type="hidden" name="build_date" value="' . $game['build_date'] . '">';
                echo '<input type="hidden" name="is_pending" value="' . $game['is_pending'] . '">';
                echo '<input type="hidden" name="is_canceled" value="' . $game['is_canceled'] . '">';
                echo '<input type="hidden" name="is_approved" value="' . $game['is_approved'] . '">';
                echo '<input type="hidden" name="is_purchased" value="' . $game['is_purchased'] . '">';
                echo '<input type="hidden" name="is_published" value="' . $game['is_published'] . '">';
                echo '<input type="hidden" name="price" value="' . $game['price'] . '">';

                echo '<button type="submit">Get Approved</button>';
                echo '</form>';
            }

            echo '</a>'; // Close the anchor tag
            echo '</div>';
        }
        ?>
    </ul>

</body>

</html>