<?php
session_start();
include 'connection.php';



$built_game_id = $_GET['built_game_id'];

// Retrieve the markup percentage from the database
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$query = "SELECT built_game_id, name, description, game_id, creator_id, price, is_published, is_purchased FROM built_games WHERE built_game_id = '$built_game_id'";
$result = mysqli_query($conn, $query);

// Fetch category data from the categories table
$query_categories = "SELECT category_id, category_name FROM categories";
$result_categories = mysqli_query($conn, $query_categories);

// Check if there are categories available
if (mysqli_num_rows($result_categories) > 0) {
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
}

if (mysqli_num_rows($result) > 0) {
    $gameInfo = mysqli_fetch_assoc($result);
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

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a class=" justify-content-between">
                                        <p>Built Game Name: </p>
                                        <p>
                                            <?php echo $gameInfo['name'] ?>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class=" justify-content-between">
                                        <p>Description: </p>
                                        <p>
                                            <?php echo $gameInfo['description'] ?>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Price: </p>
                                        <p>
                                            <?php echo $gameInfo['price'] ?>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Status: </p>
                                        <p>
                                            <?php if ($gameInfo['is_purchased'] == 1) {
                                                echo 'PURCHASED';
                                            } ?>
                                        </p>
                                    </a>
                                </li>

                            </ul>

                        </aside>


                    </div>
                </div>

                <div class="col-lg-8 posts-list">
                    <div class="single-post row">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12 mt-25">

                                    <!-- <form method="post" action="process_publish_built_game.php"
                                        enctype="multipart/form-data"> -->
                                    <form id="uploadForm" enctype="multipart/form-data">

                                        <input type="hidden" name="built_game_id" value="<?php echo $built_game_id; ?>">

                                        <input type="hidden" name="creator_id" value="<?php echo $gameInfo['creator_id']; ?>">
                                        <!-- Add this line -->

                                        <!-- Rest of your form inputs -->

                                        <label for="game_name">Final Publishing Game Name:</label><br>
                                        <input type="text" id="game_name" name="game_name"><br>

                                        <label for="category">Category:</label><br>
                                        <select id="category" name="category" required>
                                            <option value="" disabled selected>Select a category</option>
                                            <?php
                                            // Loop through the categories and populate the dropdown
                                            foreach ($categories as $category) {
                                                echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                                            }
                                            ?>
                                        </select><br>

                                        <label for="edition">Edition:</label><br>
                                        <input type="text" id="edition" name="edition"><br>

                                        <!-- number of players -->
                                        <label for="min_players">Number of Players (Minimum):</label><br>
                                        <input type="number" id="min_players" name="min_players" required><br>

                                        <label for="max_players">Number of Players (Maximum):</label><br>
                                        <input type="number" id="max_players" name="max_players" required><br>

                                        <!-- play time -->
                                        <label for="min_playtime">Play Time (Minimum):</label><br>
                                        <input type="number" id="min_playtime" name="min_playtime" required><br>

                                        <label for="max_playtime">Play Time (Maximum):</label><br>
                                        <input type="number" id="max_playtime" name="max_playtime" required><br>

                                        <!-- Age dropdown -->
                                        <label for="age">Age:</label><br>
                                        <select id="age" name="age">
                                            <?php
                                            // Retrieve age values from the Age table and populate the dropdown
                                            $ageQuery = "SELECT * FROM age";
                                            $ageResult = mysqli_query($conn, $ageQuery);

                                            while ($ageRow = mysqli_fetch_assoc($ageResult)) {
                                                echo '<option value="' . $ageRow['age_id'] . '">' . $ageRow['age_value'] . '</option>';
                                            }
                                            ?>
                                        </select><br>

                                        <!-- others -->
                                        <label for="short_description">Short Description:</label><br>
                                        <textarea id="short_description" name="short_description" required></textarea><br>

                                        <label for="long_description">Long Description:</label><br>
                                        <textarea id="long_description" name="long_description" required></textarea><br>

                                        <label for="website">Website:</label><br>
                                        <input type="url" id="website" name="website"><br>

                                        <label for="logo">Logo:</label><br>
                                        <input type="file" class="filepond" name="logo" accept="image/*" required>

                                        <label for="game_images">Game Images:</label><br>
                                        <input type="file" class="filepond" name="game_images[]" multiple required>



                                        <div id="partitions">
                                            <p>Percentage: <span id="cost">
                                                    <?php echo $markup_percentage . '%'; ?>
                                                </span></p>

                                            <label for="desired_markup">Desired Markup:</label>
                                            <input type="number" name="desired_markup" id="desired_markup" required>

                                            <!-- Hidden input fields to store calculated values -->
                                            <label for="manufacturer_profit">STKR:</label>
                                            <input type="number" id="manufacturerProfitInput" name="manufacturer_profit" readonly>

                                            <label for="creator_profit">Creator:</label>
                                            <input type="number" id="creatorProfitInput" name="creator_profit" readonly>

                                            <label for="marketplace_price">Marketplace Price:</label>
                                            <input type="number" id="marketplacePriceInput" name="marketplace_price" readonly>
                                        </div>


                                        <br>

                                        <button type="submit" name="update">Publish Game</button>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

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
                            url: 'process_publish_built_game.php',
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
                                    window.location.href = 'create_game_page.php#section6';
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
        });
    </script>
</body>

</html>