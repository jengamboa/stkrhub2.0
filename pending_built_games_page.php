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


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

<br><br><br><br>

<?php
// Retrieve pending built games for the logged-in user
$query_pending_games = "SELECT * FROM built_games WHERE creator_id = '$user_id' AND is_pending = 1";
$result_pending_games = mysqli_query($conn, $query_pending_games);
?>

<div class="panel">
    <h2>Pending Built Games</h2>
    <ul>
        <?php
        while ($game = mysqli_fetch_assoc($result_pending_games)) {
            echo '<li>';
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

            echo '</li>';
        }
        ?>
    </ul>
</div>
