<?php
session_start();
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the unauthorized access as needed
    header("Location: login_page.php"); // Change to your login page URL
    exit();
}


// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];


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

<h2>Purchased Built Games</h2>
<ul>
    
</ul>


<!DOCTYPE html>
<html>

<head>
    <title>Purchased Built Games</title>

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

    <h2>Purchased Built Games</h2>
   

    <!--
        pagination start
        ============================================= -->
    <div id="test-list"> 
        <input type="text" class="search" />
        <ul class="list">

            <?php

                // Retrieve purchased built games
                $query = "SELECT * FROM built_games WHERE is_purchased = 1 AND creator_id = $user_id";
                $result = mysqli_query($conn, $query);  
            ?>

                
                <?php while ($game = mysqli_fetch_assoc($result)) { ?>
                    <li>
                        <p>Built Game ID:
                            <?php echo $game['built_game_id']; ?>
                        </p>
                        <p>Game ID:
                            <?php echo $game['game_id']; ?>
                        </p>
                        
                            <?php echo '<p class = "name">Name: ' . $game['name'] . '</p>'; ?>
                
                        <p>Description:
                            <?php echo $game['description']; ?>
                        </p>
                        <p>Creator ID:
                            <?php echo $game['creator_id']; ?>
                        </p>
                        <p>Build Date:
                            <?php echo $game['build_date']; ?>
                        </p>
                        <p>Is Pending:
                            <?php echo ($game['is_pending'] == 1 ? 'Yes' : 'No'); ?>
                        </p>
                        <p>Is Canceled:
                            <?php echo ($game['is_canceled'] == 1 ? 'Yes' : 'No'); ?>
                        </p>
                        <p>Is Approved:
                            <?php echo ($game['is_approved'] == 1 ? 'Yes' : 'No'); ?>
                        </p>
                        <p>Is Purchased:
                            <?php echo ($game['is_purchased'] == 1 ? 'Yes' : 'No'); ?>
                        </p>
                        <p>Is Published:
                            <?php echo ($game['is_published'] == 1 ? 'Yes' : 'No'); ?>
                        </p>
                        <p>Price: $
                            <?php echo $game['price']; ?>
                        </p>
            
                        <?php if ($game['is_published'] == 0) { ?>
                            <a href="edit_game_page.php?built_game_id=<?php echo $game['built_game_id']; ?>">Publish</a>
                        <?php } else { ?>
                            <p>Already Published</p>
            
                        <?php } ?>
                    </li>
                <?php } ?>
            
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