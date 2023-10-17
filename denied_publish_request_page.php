<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: login_page.php");
    exit;
}

$built_game_id = $_GET['built_game_id'];


$sqlGetPendingPublishRequest = "SELECT * FROM pending_published_built_games WHERE built_game_id = $built_game_id";
$queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
while ($fetchedPendingPublishRequest = $queryGetPendingPublishRequest->fetch_assoc()) {
    $pending_published_built_game_id = $fetchedPendingPublishRequest['pending_published_built_game_id'];
    $game_name = $fetchedPendingPublishRequest['game_name'];
    $category = $fetchedPendingPublishRequest['category'];
    $edition = $fetchedPendingPublishRequest['edition'];
    $published_date = $fetchedPendingPublishRequest['published_date'];
    $age_id = $fetchedPendingPublishRequest['age_id'];
    $short_description = $fetchedPendingPublishRequest['short_description'];
    $long_description = $fetchedPendingPublishRequest['long_description'];
    $website = $fetchedPendingPublishRequest['website'];
    $logo_path = $fetchedPendingPublishRequest['logo_path'];
    $min_players = $fetchedPendingPublishRequest['min_players'];
    $max_players = $fetchedPendingPublishRequest['max_players'];
    $min_playtime = $fetchedPendingPublishRequest['min_playtime'];
    $max_playtime = $fetchedPendingPublishRequest['max_playtime'];
    $has_pending_update = $fetchedPendingPublishRequest['has_pending_update'];
    $desired_markup = $fetchedPendingPublishRequest['desired_markup'];
    $manufacturer_profit = $fetchedPendingPublishRequest['manufacturer_profit'];
    $creator_profit = $fetchedPendingPublishRequest['creator_profit'];
    $marketplace_price = $fetchedPendingPublishRequest['marketplace_price'];
}

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
<html lang="en">

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
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css?<?php echo time(); ?>" />

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/body.css' ?><?php include 'css/header.css'; ?>#infoTable .odd {
            background-color: transparent;
        }


        table.dataTable,
        table.dataTable thead,
        table.dataTable tbody,
        table.dataTable tr,
        table.dataTable td,
        table.dataTable th,
        table.dataTable tbody tr.even,
        table.dataTable tbody tr.odd {
            border: none !important;
        }

        .sticky-wrapper {
            top: 0px !important;
        }

        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        .form-control::placeholder {
            font-size: 14px;
            /* Adjust the font size as needed */
        }



        /* edit button */
        .edit-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #90ee90;
        }

        /* delete button */
        .delete-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        .delete-component {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        .approve-game {
            background-color: #1f2243 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        .cancel-ticket {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        label {
            color: white;
        }


        /* datatables */
        table.dataTable.stripe tbody tr.even,
        table.dataTable.display tbody tr.even {
            background-color: #15172e;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #1f2243;
        }

        .odd {
            margin: 20px;
        }

        #userTable {
            box-shadow: 0 0 10px #000000;
        }

        tr .odd {
            padding: 10rem;
        }

        table.dataTable,
        table.dataTable thead,
        table.dataTable tbody,
        table.dataTable tr,
        table.dataTable td,
        table.dataTable th,
        table.dataTable tbody tr.even,
        table.dataTable tbody tr.odd {
            border: none !important;
        }

        input[type="search"] {
            color: white;
        }

        .approve-game[disabled] {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
        }

        .dataTables_length {
            display: none;
            /* Hide the length dropdown */
        }



        /* filepond */
        .filepond--item {
            width: calc(25% - 0.5em)
        }

        .filepond--drop-label {
            color: #4c4e53;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            border-radius: 2em;
            background-color: #edf0f4;
            height: 1em;
        }

        .filepond--item-panel {
            background-color: #595e68;
        }

        .filepond--drip-blob {
            background-color: #7f8a9a;
        }


        /* swiper */
        .swiper-container {
            width: 100%;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .image-carousel-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-carousel {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .image-slide-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-slide {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>

    <!-- Back to top button -->
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <h1><a href="create_game_page.php#section1" class="fa-solid fa-arrow-left" style="color: #26d3e0; cursor:pointer;"></a> Game Dashboard</h1>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <table id="infoTable" class="display" style="width: 100%;"></table>
                        <tbody>
                        </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <div class="container" style="display:flex; flex-direction:column; gap: 20px;">
                            <?php
                            $sqlTutorials = "SELECT * FROM tutorials WHERE designation = 'publish_game' LIMIT 1";
                            $result = $conn->query($sqlTutorials);

                            while ($fetchedTutorials = $result->fetch_assoc()) {
                                $tutorial_id = $fetchedTutorials['tutorial_id'];
                                $tutorial_title = $fetchedTutorials['tutorial_title'];
                                $tutorial_description = $fetchedTutorials['tutorial_description'];
                                $tutorial_link = $fetchedTutorials['tutorial_link'];;
                                $is_primary = $fetchedTutorials['is_primary'];
                                $time_added = $fetchedTutorials['time_added'];

                                echo '
                            <div class="row s_product_inner">
                                <div class="col-lg-8">
                                    <div class="iframe-container">
                                        <iframe class="iframe" src="' . $tutorial_link . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col-lg-4 offset-lg-1" style="margin-left: 0px; margin-top: 0px;">
                                    <div class="s_product_text" style="margin-top: 20px;line-height: 10px;">
                                        <h6>' . $tutorial_title . '</h6>

                                        <div style="
                                            width: 100%;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 7;
                                            -webkit-box-orient:vertical;
                                            overflow: hidden;
                                            ">
                                            <span class="small">
                                                ' . $tutorial_description . '
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="container">

            <table id="builtGameTable" class="display">
                <thead>
                    <tr>
                        <th>Component Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


        </div>

        <div class="container">
            <div class="row">
                <div class="col" style="position: relative;">
                    <h3>Your Page Info Requests:</h3>
                    <br>

                    <h5>Final Game Name:</h5>
                    <h6>
                        <?php echo $game_name ?>
                    </h6>
                    <br>

                    <h5>Category:</h5>
                    <h6>
                        <?php echo $category ?>
                    </h6>
                    <br>

                    <h5>Edition:</h5>
                    <h6>
                        <?php echo $edition ?>
                    </h6>
                    <br>

                    <h5>Age:</h5>
                    <h6>
                        <?php echo $age_id ?>
                    </h6>
                    <br>

                    <h5>Short Description:</h5>
                    <h6>
                        <?php echo $short_description ?>
                    </h6>
                    <br>

                    <h5>Long Description:</h5>
                    <h6>
                        <?php echo $long_description ?>
                    </h6>
                    <br>

                    <h5>Website:</h5>
                    <h6>
                        <?php echo $website ?>
                    </h6>
                    <br>

                    <!-- <h5>Logo:</h5>
                            <img src="<?php echo $logo_path ?>" alt="">
                            <br> -->

                    <h5>Minimum Players:</h5>
                    <h6>
                        <?php echo $min_players ?>
                    </h6>
                    <br>

                    <h5>Maximum Players:</h5>
                    <h6>
                        <?php echo $max_players ?>
                    </h6>
                    <br>

                    <h5>Minimum Playtime:</h5>
                    <h6>
                        <?php echo $min_playtime ?>
                    </h6>
                    <br>

                    <h5>Maximum Playtime:</h5>
                    <h6>
                        <?php echo $max_playtime ?>
                    </h6>
                    <br>

                    <h5>Desired Markup:</h5>
                    <h6>
                        <?php echo $desired_markup ?>
                    </h6>
                    <br>

                    <h5>Manufacturer Profit:</h5>
                    <h6>
                        <?php echo $manufacturer_profit ?>
                    </h6>
                    <br>

                    <h5>Creator Profit:</h5>
                    <h6>
                        <?php echo $creator_profit ?>
                    </h6>
                    <br>

                    <h5>Marketplace Profit:</h5>
                    <h6>
                        <?php echo $marketplace_price ?>
                    </h6>
                    <br>

                    <div class="swiper-container" style="position: absolute;">

                        <div class="swiper mySwiper2" style="margin-bottom: 10px;">
                            <div class="swiper-wrapper">

                                <?php
                                $sqlBig = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
                                $resultBig = $conn->query($sqlBig);

                                while ($fetchedBig = $resultBig->fetch_assoc()) {
                                    $pending_published_file_id = $fetchedBig['pending_published_file_id'];
                                    $file_path = $fetchedBig['file_path'];

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                    $file_extension = strtolower($extension);

                                    // Check if the file extension is "mp4"
                                    if ($file_extension === "mp4") {
                                        echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-carousel-container">
                                                            <video class="image-carousel" controls>
                                                                <source src="' . $file_path . '" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    </div>
                                                ';
                                    } else {
                                        echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-carousel-container">
                                                            <img class="image-carousel" src="' . $file_path . '" />
                                                        </div>
                                                    </div>
                                                ';
                                    }
                                }
                                ?>

                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">

                                <?php
                                $sqlSmall = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
                                $resultSmall = $conn->query($sqlSmall);

                                while ($fetchedSmall = $resultSmall->fetch_assoc()) {
                                    $pending_published_file_id = $fetchedSmall['pending_published_file_id'];
                                    $file_path = $fetchedSmall['file_path'];

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                    $file_extension = strtolower($extension);

                                    // Check if the file extension is "mp4"
                                    if ($file_extension === "mp4") {
                                        echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-slide-container">
                                                            <video class="image-slide">
                                                                <source src="' . $file_path . '">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    </div>
                                                ';
                                    } else {
                                        echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-slide-container">
                                                            <img class="image-slide" src="' . $file_path . '" />
                                                        </div>
                                                    </div>
    
                                                ';
                                    }
                                }
                                ?>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <form id="uploadForm" enctype="multipart/form-data">

                            <input type="hidden" name="built_game_id" value="<?php echo $built_game_id; ?>">

                            <input type="hidden" name="creator_id" value="<?php echo $gameInfo['creator_id']; ?>">



                            <div class="row">
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="text" id="game_name" name="game_name" class="form-control" required />
                                        <label class="form-label" for="form8Example1">Final Publishing Game Name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Email input -->
                                    <div class="form-outline">
                                        <input type="text" id="edition" name="edition" class="form-control" required />
                                        <label class="form-label" for="form8Example2">Edition</label>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <select class="" id="category" name="category" required>
                                            <option class="form-control" value="" disabled selected>Select a category</option>
                                            <?php
                                            // Loop through the categories and populate the dropdown
                                            foreach ($categories as $category) {
                                                echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <select id="age" name="age" required>
                                            <option class="form-control" value="" disabled selected>Select a Age</option>
                                            <?php
                                            // Retrieve age values from the Age table and populate the dropdown
                                            $ageQuery = "SELECT * FROM age";
                                            $ageResult = mysqli_query($conn, $ageQuery);

                                            while ($ageRow = mysqli_fetch_assoc($ageResult)) {
                                                echo '<option value="' . $ageRow['age_id'] . '">' . $ageRow['age_value'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="number" id="min_players" name="min_players" class="form-control" required />
                                        <label class="form-label" for="form8Example4">Number of Players (Minimum)</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-outline">
                                        <input type="number" id="max_players" name="max_players" class="form-control" required />
                                        <label class="form-label" for="form8Example4">Number of Players (Maximum)</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-outline">
                                        <input type="number" id="min_playtime" name="min_playtime" class="form-control" required />
                                        <label class="form-label" for="form8Example4">Play Time (Minimum)</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-outline">
                                        <input type="number" id="max_playtime" name="max_playtime" class="form-control" required />
                                        <label class="form-label" for="form8Example4">Play Time (Maximum)</label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="url" id="website" name="website" class="form-control" />
                                        <label class="form-label" for="form8Example4">Website</label>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <textarea class="form-control" id="short_description" name="short_description" required></textarea>
                                        <label class="form-label" for="form8Example1">Short Description</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <textarea class="form-control" id="long_description" name="long_description" required></textarea>
                                        <label class="form-label" for="form8Example1">Long Description</label>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="file" class="filepond" name="logo" accept="image/*" required>
                                        <label class="form-label" for="form8Example1">Logo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="file" class="filepond" name="game_images[]" multiple required>
                                        <label class="form-label" for="form8Example1">Game Images</label>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <p>Percentage:
                                <span id="cost">
                                    <?php echo $markup_percentage . '%'; ?>
                                </span>
                            </p>
                            <div class="row" id="partitions">

                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="number" id="desired_markup" name="desired_markup" class="form-control" required />
                                        <label class="form-label" for="form8Example1">Desired Markup</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="number" id="manufacturerProfitInput" name="manufacturer_profit" class="form-control" readonly />
                                        <label class="form-label" for="form8Example1">STKR LAB's profit</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="number" id="creatorProfitInput" name="creator_profit" class="form-control" readonly />
                                        <label class="form-label" for="form8Example1">Your profit</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Name input -->
                                    <div class="form-outline">
                                        <input type="number" id="marketplacePriceInput" name="marketplace_price" class="form-control" readonly />
                                        <label class="form-label" for="form8Example1">Marketplace Price</label>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <button type="submit" name="update">Publish Game</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>



    </section>
    <!-- End Sample Area -->


    <!-- new jquery version -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js?<?php echo time(); ?>"></script>


    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>




    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.js"></script>




    <script>
        $(document).ready(function() {


            // swiper
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });



            $('#infoTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_info_table_built_game.php",
                    data: {
                        built_game_id: <?php echo $built_game_id; ?>,
                        user_id: <?php echo $user_id; ?>
                    },
                    dataSrc: ""
                },
                columns: [{
                    data: "item"
                }, ]
            });


            var user_id = <?php echo $user_id; ?>;
            var built_game_id = <?php echo $built_game_id; ?>;

            $('#builtGameTable').DataTable({

                searching: true,
                info: false,
                paging: true,
                "pageLength": 5,
                ordering: false,
                "ajax": {
                    "url": "json_built_game_dashboard.php",
                    data: {
                        user_id: user_id,
                        built_game_id: built_game_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "component_name"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "quantity"
                    },
                    {
                        "data": "individual_price"
                    },
                    {
                        "data": "info"
                    },
                ]
            });


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
                            url: 'process_publish_built_game_request_again.php',
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