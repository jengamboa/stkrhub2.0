<?php
session_start();
include 'connection.php';
include 'html/page_header2.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

?>


<div>
    <a href="create_game.php">Create Game</a>
    <a href="created_games_page.php">Created Games</a>
    <a href="built_games_page.php">Built Games</a>
    <a href="pending_built_games_page.php">Pending</a>
    <a href="canceled_built_games_page.php">Canceled</a>
    <a href="approved_built_games_page.php">Approved</a>
    <a href="purchased_built_games_page.php">Purchased</a>
    <a href="published_built_games_page.php">Published</a>
</div>


<!DOCTYPE html>
<html>

<head>
    <title>Canceled Built Games</title>

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

    <h2>Canceled Games</h2>
   

    <!--
        pagination start
        ============================================= -->
    <div id="test-list"> 
        <input type="text" class="search" />
        <ul class="list">

            <?php

                            // Retrieve canceled built games
                $query_canceled_games = "SELECT * FROM built_games WHERE is_canceled = 1";
                $result_canceled_games = mysqli_query($conn, $query_canceled_games);

                
                while ($game = mysqli_fetch_assoc($result_canceled_games)) {
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
        
                    echo '<form method="post" action="review_built_games_page.php">';
                    echo '<input type="hidden" name="built_game_id" value="' . $game['built_game_id'] . '">';
                    echo '<button type="submit">View Here</button>';
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