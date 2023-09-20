<?php
session_start();

include 'connection.php';
include 'html/page_header2.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Define the calculateTotalPrice() function
function calculateTotalPrice($game_id)
{
    global $conn;

    $total_price = 0;

    // Retrieve the added game components for this game from the "added_game_components" table
    $query_components = "SELECT gc.price, agc.quantity FROM added_game_components agc
                        INNER JOIN game_components gc ON agc.component_id = gc.component_id
                        WHERE agc.game_id = '$game_id'";
    $result_components = mysqli_query($conn, $query_components);

    // Calculate the total price by summing up the prices of all added components, considering quantity
    while ($component = mysqli_fetch_assoc($result_components)) {
        $total_price += $component['price'] * $component['quantity'];
    }

    return $total_price;
}

// Retrieve all games created by the current user from the "games" table
$query = "SELECT * FROM games WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Games</title>

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

    <!-- pagination script ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <!--sweetalert script============================================= -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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


    <br><br><br><br>
    <div class="panel">
        <h2>All Created Games</h2>
        

    <!--
        pagination start
        ============================================= -->
        <div id="test-list"> 
            <input type="text" class="search" />
                <ul class="list">

                    <?php
                        while ($game = mysqli_fetch_assoc($result)) {
                            echo '<li>';
                            echo '<a href="game_dashboard.php?game_id=' . $game['game_id'] . '" class="name">' . $game['name'] . '</a>';
                            echo '<br> Total Price: $' . calculateTotalPrice($game['game_id']); // Call the function here

                            echo '<form method="post" action="process_build_game.php">';
                            echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
                            echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                            echo '<input type="hidden" name="game_name" value="' . $game['name'] . '">';
                            echo '<input type="hidden" name="game_price" value="' . calculateTotalPrice($game['game_id']) . '">'; // Add this line

                            // Additional hidden fields
                            echo '<input type="hidden" name="description" value="' . $game['description'] . '">';


                            echo 'Is Built: ' . ($game['is_built'] == 1 ? 'Yes' : 'No'); // Display is_built here

                            echo '<br><button type="submit" name="build_game">Build Game</button>';
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

    </div>



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