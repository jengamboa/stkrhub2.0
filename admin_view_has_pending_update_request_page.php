<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['published_built_game_id'])) {
        $published_game_id = $_GET['published_built_game_id'];
    }
}



// Retrieve the markup percentage from the database
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$sqlPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
$queryPublished = $conn->query($sqlPublished);
while ($fetchedPublished = $queryPublished->fetch_assoc()) {

    $built_game_id = $fetchedPublished['built_game_id'];
    $game_name = $fetchedPublished['game_name'];
    $category = $fetchedPublished['category'];
    $edition = $fetchedPublished['edition'];
    $published_date = $fetchedPublished['published_date'];

    $age_id = $fetchedPublished['age_id'];

    $sqlGetAge = "SELECT * FROM age WHERE age_id = $age_id";
    $queryGetAge = $conn->query($sqlGetAge);
    while ($fetchedAge = $queryGetAge->fetch_assoc()) {
        $age_value = $fetchedAge['age_value'];
    }

    $short_description = $fetchedPublished['short_description'];
    $long_description = $fetchedPublished['long_description'];
    $website = $fetchedPublished['website'];
    $logo_path = $fetchedPublished['logo_path'];

    $min_players = $fetchedPublished['min_players'];
    $max_players = $fetchedPublished['max_players'];
    $min_playtime = $fetchedPublished['min_playtime'];
    $max_playtime = $fetchedPublished['max_playtime'];

    $has_pending_update = $fetchedPublished['has_pending_update'];

    $desired_markup = $fetchedPublished['desired_markup'];
    $manufacturer_profit = $fetchedPublished['manufacturer_profit'];
    $creator_profit = $fetchedPublished['creator_profit'];
    $marketplace_price = $fetchedPublished['marketplace_price'];

    $is_hidden = $fetchedPublished['is_hidden'];

    $sqlGetPrice = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $queryGetPrice = $conn->query($sqlGetPrice);
    while ($FetchedPrice = $queryGetPrice->fetch_assoc()) {
        $price = (int)$FetchedPrice = ['price'];
    }
}



$sqlNewPublished = "SELECT * FROM pending_update_published_built_games WHERE published_built_game_id = $published_game_id";
$queryNewPublished = $conn->query($sqlNewPublished);
while ($fetchedNewPublished = $queryNewPublished->fetch_assoc()) {

    $pending_update_published_built_games_id = $fetchedNewPublished['pending_update_published_built_games_id'];
    $new_built_game_id = $fetchedNewPublished['built_game_id'];
    $new_game_name = $fetchedNewPublished['game_name'];
    $new_category = $fetchedNewPublished['category'];
    $new_edition = $fetchedNewPublished['edition'];
    $new_published_date = $fetchedNewPublished['published_date'];

    $new_age_id = $fetchedNewPublished['age_id'];

    $sqlGetNewAge = "SELECT * FROM age WHERE age_id = $age_id";
    $queryGetNewAge = $conn->query($sqlGetNewAge);
    while ($fetchedNewAge = $queryGetNewAge->fetch_assoc()) {
        $new_age_value = $fetchedNewAge['age_value'];
    }

    $new_short_description = $fetchedNewPublished['short_description'];
    $new_long_description = $fetchedNewPublished['long_description'];
    $new_website = $fetchedNewPublished['website'];
    $new_logo_path = $fetchedNewPublished['logo_path'];

    $new_min_players = $fetchedNewPublished['min_players'];
    $new_max_players = $fetchedNewPublished['max_players'];
    $new_min_playtime = $fetchedNewPublished['min_playtime'];
    $new_max_playtime = $fetchedNewPublished['max_playtime'];


    $new_desired_markup = $fetchedNewPublished['desired_markup'];
    $new_manufacturer_profit = $fetchedNewPublished['manufacturer_profit'];
    $new_creator_profit = $fetchedNewPublished['creator_profit'];
    $new_marketplace_price = $fetchedNewPublished['marketplace_price'];



    $new_sqlGetPrice = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $new_queryGetPrice = $conn->query($new_sqlGetPrice);
    while ($FetchedNewPrice = $new_queryGetPrice->fetch_assoc()) {
        $new_price = (int)$FetchedNewPrice = ['price'];
    }
}



$query = "SELECT built_game_id, name, description, game_id, creator_id, price, is_published, is_purchased FROM built_games WHERE built_game_id = '$built_game_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $gameInfo = mysqli_fetch_assoc($result);
}


// Fetch category data from the categories table
$query_categories = "SELECT category_id, category_name FROM categories";
$result_categories = mysqli_query($conn, $query_categories);

// Check if there are categories available
if (mysqli_num_rows($result_categories) > 0) {
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Navigation with Hidden Sections</title>
    <!--CSS================================== -->
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

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- filepond css -->
    <link href="https://unpkg.com/filepond@4.28.2/dist/filepond.css" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/body.css'; ?>
    </style>
</head>

<body>

    <?php include 'html/page_header.php'; ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">

            <div class="row py-5">
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Make Game Page</h4>
                        <ul class="list">
                            <!-- <li><a href="#"><span>Order number</span> : 60235</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- CURRENT -->
                <div class="col posts-list">
                    <div class="single-post row">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12 mt-25">

                                    <!-- content -->
                                    <div class="content">


                                        <h4>Current Details:</h4>

                                        <h6>
                                            Published Game Name: <?php echo $game_name ?>
                                        </h6>

                                        <h6>
                                            category: <?php echo $category ?>
                                        </h6>

                                        <h6>
                                            edition: <?php echo $edition ?>
                                        </h6>

                                        <h6>
                                            age: <?php echo $age_value ?>
                                        </h6>

                                        <h6>
                                            short_description: <?php echo $short_description ?>
                                        </h6>

                                        <h6>
                                            long_description: <?php echo $long_description ?>
                                        </h6>

                                        <h6>
                                            website: <?php echo $website ?>
                                        </h6>

                                        <h6>
                                            logo_path: <?php echo $logo_path ?>
                                        </h6>

                                        <h6>
                                            min_players: <?php echo $min_players ?>
                                        </h6>

                                        <h6>
                                            max_players: <?php echo $max_players ?>
                                        </h6>

                                        <h6>
                                            min_playtime: <?php echo $min_playtime ?>
                                        </h6>

                                        <h6>
                                            max_playtime: <?php echo $max_playtime ?>
                                        </h6>


                                        <h6>
                                            desired_markup: <?php echo $desired_markup ?>
                                        </h6>

                                        <h6>
                                            manufacturer_profit: <?php echo $manufacturer_profit ?>
                                        </h6>

                                        <h6>
                                            creator_profit: <?php echo $creator_profit ?>
                                        </h6>

                                        <h6>
                                            creator_profit: <?php echo $creator_profit ?>
                                        </h6>

                                        <h6>
                                            marketplace_price: <?php echo $marketplace_price ?>
                                        </h6>

                                        <?php
                                        $imageQuery = "SELECT * FROM published_multiple_files WHERE published_built_game_id = '$published_game_id'";
                                        $imageResult = mysqli_query($conn, $imageQuery);

                                        echo '<h2>Game Images</h2>';
                                        while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                                            $imagePath = $imageRow['file_path'];
                                            echo '<img src="' . $imagePath . '" alt="Game Image">';
                                        }
                                        ?>




                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <!-- NEW FORM -->
                <div class="col posts-list">
                    <div class="single-post row">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12 mt-25">



                                    <!-- content -->
                                    <div class="content">


                                        <h4>New Request Update Details:</h4>

                                        <h6>
                                            Published Game Name: <?php echo $new_game_name ?>
                                        </h6>

                                        <h6>
                                            category: <?php echo $new_category ?>
                                        </h6>

                                        <h6>
                                            edition: <?php echo $new_edition ?>
                                        </h6>

                                        <h6>
                                            age: <?php echo $new_age_value ?>
                                        </h6>

                                        <h6>
                                            short_description: <?php echo $new_short_description ?>
                                        </h6>

                                        <h6>
                                            long_description: <?php echo $new_long_description ?>
                                        </h6>

                                        <h6>
                                            website: <?php echo $new_website ?>
                                        </h6>

                                        <h6>
                                            logo_path: <?php echo $new_logo_path ?>
                                        </h6>

                                        <h6>
                                            min_players: <?php echo $new_min_players ?>
                                        </h6>

                                        <h6>
                                            max_players: <?php echo $new_max_players ?>
                                        </h6>

                                        <h6>
                                            min_playtime: <?php echo $new_min_playtime ?>
                                        </h6>

                                        <h6>
                                            max_playtime: <?php echo $new_max_playtime ?>
                                        </h6>


                                        <h6>
                                            desired_markup: <?php echo $new_desired_markup ?>
                                        </h6>

                                        <h6>
                                            manufacturer_profit: <?php echo $new_manufacturer_profit ?>
                                        </h6>

                                        <h6>
                                            creator_profit: <?php echo $new_creator_profit ?>
                                        </h6>

                                        <h6>
                                            creator_profit: <?php echo $new_creator_profit ?>
                                        </h6>

                                        <h6>
                                            marketplace_price: <?php echo $new_marketplace_price ?>
                                        </h6>

                                        <?php
                                        $new_imageQuery = "SELECT * FROM pending_update_published_multiple_files WHERE published_built_game_id = '$published_game_id'";
                                        $new_imageResult = mysqli_query($conn, $new_imageQuery);

                                        echo '<h2>Game Images</h2>';
                                        while ($new_imageRow = mysqli_fetch_assoc($new_imageResult)) {
                                            $new_imagePath = $new_imageRow['file_path'];
                                            echo '<img src="' . $new_imagePath . '" alt="Game Image">';
                                        }
                                        ?>




                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <button id="approveUpdate" data-published-game-id="<?php echo $published_game_id; ?>">Approve Update Request</button>

                <button id="cancelUpdate" data-published-game-id="<?php echo $published_game_id; ?>">Deny Update</button>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->

    <!-- filepond -->
    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.js"></script>

    <!-- new jquery version -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>



    <script>
        $(document).ready(function() {

            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                Swal.fire({
                    title: '',
                    text: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'process_update_publish_built_game.php',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log(response);

                                // Display a SweetAlert success notification
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                }).then(function() {
                                    window.location.href = 'create_game_page.php#section7';
                                });
                            },
                        });
                    }
                });

            });



            // Initialize FilePond with the specified settings
            const inputElement = document.querySelector('input[name="logo"]');
            const pond = FilePond.create(inputElement, {
                allowMultiple: false, // Each input handles a single file
                allowReplace: true,
                allowRemove: true,
                allowBrowse: true,
                storeAsFile: true,
                required: true
            });

            // Initialize FilePond for the game images input
            const imageInput = document.querySelector('input[name="game_images[]"]');
            const imagePond = FilePond.create(imageInput, {
                allowMultiple: true, // Allow multiple files to be uploaded
                allowReplace: true,
                allowRemove: true,
                allowBrowse: true,
                storeAsFile: true,
                required: true,
                maxFiles: 10,
            });





            // Get the initial cost from PHP variable
            var cost = <?php echo $gameInfo['price']; ?>;
            var markupPercentage = <?php echo $markup_percentage; ?>; // Get the markup percentage

            // Set up event listener for desired markup change
            $('#desired_markup').on('input', function() {
                var desiredMarkup = parseFloat($(this).val()); // Parse the input value as a float

                // STKR Hub
                var manufacturerProfit = desiredMarkup * (markupPercentage / 100);
                $('#manufacturerProfit').text(manufacturerProfit.toFixed(2));

                // Creator
                var creatorProfit = desiredMarkup * ((100 - markupPercentage) / 100);
                $('#creatorProfit').text(creatorProfit.toFixed(2));

                // Marketplace Price
                var marketplacePrice = desiredMarkup + cost;
                $('#marketplacePrice').text(marketplacePrice.toFixed(2));

                // Update the hidden input fields with calculated values
                $('#manufacturerProfitInput').val(manufacturerProfit.toFixed(2));
                $('#creatorProfitInput').val(creatorProfit.toFixed(2));
                $('#marketplacePriceInput').val(marketplacePrice.toFixed(2));
            });










            $('#approveUpdate').click(function() {

                var published_game_id = $(this).data('published-game-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'Are you sure to Approve this?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, send an AJAX request to process_cancel_details_request.php
                        $.ajax({
                            url: 'admin_process_approve_publish_request.php',
                            type: 'POST',
                            data: {
                                published_game_id: published_game_id
                            },
                            success: function(response) {
                                // Display a SweetAlert to inform success
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request has been Published.',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    window.location.href = 'admin_has_pending_details_request_page.php';
                                });
                            },
                            error: function() {
                                Swal.fire('Error', 'Failed to cancel the request.', 'error');
                            }
                        });
                    } else {
                        // User canceled, do nothing or provide feedback if needed
                        Swal.fire('Cancelled', 'Your request is still active.', 'info');
                    }
                });
            });


        });
    </script>
</body>

</html>