<?php
session_start();
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    echo '<div>';
    echo '<a href="create_game.php">Create Game</a>';
    echo '<a href="created_games_page.php">Created Games</a>';
    echo '<a href="built_games_page.php">Built Games</a>';
    echo '<a href="pending_built_games_page.php">Pending</a>';
    echo '<a href="canceled_built_games_page.php">Canceled</a>';
    echo '<a href="approved_built_games_page.php">Approved</a>';
    echo '<a href="purchased_built_games_page.php">Purchased</a>';
    echo '<a href="published_built_games_page.php">Published</a>';
    echo '</div>';

    // Retrieve built games with is_approved = 1 for the logged-in user
    $query_approved_games = "SELECT * FROM built_games WHERE is_approved = 1 AND creator_id = '$user_id'";
    $result_approved_games = mysqli_query($conn, $query_approved_games);
    } else {
    // Redirect to the login page if the user is not logged in
    header('Location: login_page.php');
    exit();}
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Approved Built Games</title>

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
    
    <!--
        pagination script
        ============================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>



    <!--
        pagination css
        ============================================= -->
    <style>
        .pagination li {
        display:inline-block;
        padding:5px;
        }
    </style>

</head>

<body>


    <br><br><br>

    <h2>Approved Built Games</h2>
   

    <!--
        pagination start
        ============================================= -->
    <div id="test-list"> 
        <input type="text" class="search" />
        <ul class="list">

            <?php
    
                while ($game = mysqli_fetch_assoc($result_approved_games)) {
                    echo '<li>';
                    echo 'Built Game ID: ' . $game['built_game_id'] . '<br>';
                    echo 'Game ID: ' . $game['game_id'] . '<br>';
                    echo '<p class = "name">Name: ' . $game['name'] . '</p>';
                    echo 'Description: ' . $game['description'] . '<br>';
                    echo 'Creator ID: ' . $game['creator_id'] . '<br>';
                    echo 'Build Date: ' . $game['build_date'] . '<br>';
                    echo 'Is Pending: ' . ($game['is_pending'] == 1 ? 'Yes' : 'No') . '<br>';
                    echo 'Is Canceled: ' . ($game['is_canceled'] == 1 ? 'Yes' : 'No') . '<br>';
                    echo 'Is Approved: ' . ($game['is_approved'] == 1 ? 'Yes' : 'No') . '<br>';
                    echo 'Is Purchased: ' . ($game['is_purchased'] == 1 ? 'Yes' : 'No') . '<br>';
                    echo 'Is Published: ' . ($game['is_published'] == 1 ? 'Yes' : 'No') . '<br>';
                    echo 'Price: $' . $game['price'] . '<br>';

                    // Add "Add to Cart" button
                    echo '<form method="post" action="process_add_game_to_cart.php">';
                    echo '<input type="hidden" name="built_game_id" value="' . $game['built_game_id'] . '">';
                    echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                    echo '<input type="hidden" name="game_name" value="' . $game['name'] . '">';
                    echo '<input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">';
                    echo '<input type="hidden" name="price" value="' . $game['price'] . '">';
                    echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
                    echo '</form>';

                    echo '</li>';
                }

            ?>

            
        </ul>
        <ul class="pagination"></ul>
    </div>

    <!--
        pagination end
        ============================================= -->


    
    <script> 
    // pagination jscript

         var monkeyList = new List('test-list', {
            valueNames: ['name'],
            page: 3,
            pagination: true
         });
    </script>

</body>

</html>

