<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}


if (isset($_GET['game_id']) && isset($_GET['component_id'])) {
    $game_id = $_GET['game_id'];
    $component_id = $_GET['component_id'];
} elseif (isset($_GET['component_id']) && !isset($_GET['game_id'])) {
    $game_id = 0;
    $component_id = $_GET['component_id'];
}


$sqlGetGameDetails = "SELECT * FROM games WHERE game_id = $game_id";
$queryGetGameDetails = $conn->query($sqlGetGameDetails);
while ($fetchedGetGameDetails = $queryGetGameDetails->fetch_assoc()) {
    $name = $fetchedGetGameDetails['name'];
    $description = $fetchedGetGameDetails['description'];
    $created_at = $fetchedGetGameDetails['created_at'];
    $user_id =     $fetchedGetGameDetails['user_id'];
    $is_built = $fetchedGetGameDetails['is_built'];
}

$sqlGetComponentDetails = "SELECT * FROM game_components WHERE component_id = $component_id";
$queryGetComponentDetails = $conn->query($sqlGetComponentDetails);
while ($fetchedComponentDetails = $queryGetComponentDetails->fetch_assoc()) {
    $component_name = $fetchedComponentDetails['component_name'];
    $component_description = $fetchedComponentDetails['description'];
    $component_price = $fetchedComponentDetails['price'];
    $component_category = $fetchedComponentDetails['category'];
    $component_assets = $fetchedComponentDetails['assets'];
    $component_has_colors = $fetchedComponentDetails['has_colors'];
    $is_upload_only = $fetchedComponentDetails['is_upload_only'];
    $component_size = $fetchedComponentDetails['size'];
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Game Component Details</title>

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

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include jQuery and Isotope.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/css/isotope.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



    <style>
        <?php include 'css/body.css' ?>.swiper-slide {
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-banner-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 100%;

        }

        .image-banner {
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
    <?php
    include 'html/page_header.php';
    ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->


    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <div class="row">
                <?php
                if ($game_id == 0) {
                    echo '
                        
                    ';
                } elseif ($game_id !== 0) {
                    echo '
                        <div class="container">
                            <h5>Game Id: ' . $game_id . '</h5>
                            <h5>Game Name: ' . $name . '</h5>
                            <h5>Game Description: ' . $description . '</h5>
                            <h5>Component ID: ' . $component_id . '</h5>
                            <h5>component_category: ' . $component_category . '</h5>
                        </div>
                    ';
                }
                ?>


                <label for="mySelect">Select Size:</label>
                <select id="mySelect">
                    <?php
                    $query_category_components = "SELECT * FROM game_components WHERE category = '$component_category'";
                    $result_category_components = $conn->query($query_category_components);



                    while ($fetchedCategoryComponents = $result_category_components->fetch_assoc()) {
                        $select_component_id = $fetchedCategoryComponents['component_id'];
                        $select_component_name = $fetchedCategoryComponents['component_name'];
                        $select_description = $fetchedCategoryComponents['description'];
                        $select_price = $fetchedCategoryComponents['price'];
                        $select_category = $fetchedCategoryComponents['category'];
                        $select_has_colors = $fetchedCategoryComponents['has_colors'];
                        $select_size = $fetchedCategoryComponents['size'];

                        echo '
                            <option value="' . $select_component_id . '">' . $select_size . '</option>
                        ';
                    }

                    ?>
                </select>






                </form>

            </div>

            <div class="row mt-3"></div>

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="swiper-container" style="width: 100%;">
                                <!-- Swiper -->
                                <div class="swiper-outer">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                            $sql = "SELECT * FROM component_assets WHERE component_id = $component_id";
                                            $result = $conn->query($sql);

                                            while ($fetched_banner = $result->fetch_assoc()) {
                                                $asset_id = $fetched_banner['asset_id'];
                                                $asset_path = $fetched_banner['asset_path'];
                                                $is_thumbnail = $fetched_banner['is_thumbnail'];

                                                echo '<div class="swiper-slide">';

                                                echo '<div class="image-banner-container">';
                                                echo '<img class="image-banner" src="' . $asset_path . '" alt="">';
                                                echo '</div>';

                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="container">
                                <h6>Component Id: <?php echo $component_id ?></h6>
                                <h6>Component Name: <?php echo $component_name ?></h6>
                                <h6>Component Category: <?php echo $component_category ?></h6>
                                <h6>Component Price: <?php echo $component_price ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="container">
                                <div class="row">
                                    <h6>Description: <?php echo $component_description ?></h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3"></div>

            <div class="row">
                <div class="col">

                    <?php
                    if ($component_has_colors == 0) {
                        echo '
                        <div class="card">
                        <h5 class="card-header">Add With Design</h5>
                        <div class="card-body">
                            <p class="card-text">Description</p>
                            <div class="container">
                                <ul class="list-group">
                                    <li class="list-group-item active">Downloadable Templates:</li>';


                        $query_templates = "SELECT * FROM component_templates WHERE component_id = '$component_id'";
                        $result_templates = $conn->query($query_templates);
                        while ($fetched_templates = $result_templates->fetch_assoc()) {
                            $template_id = $fetched_templates['template_id'];
                            $template_name = $fetched_templates['template_name'];
                            $template_file_path = $fetched_templates['template_file_path'];

                            echo '
                                            <li class="list-group-item">
                                                <a href="' . $template_file_path . '" download>' . $template_name . '</a>
                                            </li>
                                        ';
                        }
                        echo '
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="mb-3">
                                <form method="post" action="process_upload_custom_design.php" enctype="multipart/form-data">

                                    <input type="hidden" name="game_id" value="' . $game_id . '">
                                    <input type="hidden" name="component_id" value="' . $component_id . '">

                                    <!-- Input to upload custom design file -->
                                    <label for="custom_design_file">Upload Custom Design:</label>
                                    <input type="file" id="custom_design_file" name="custom_design_file" required>
                                    <br>

                                    <!-- Input for quantity -->
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                                    <br>

                                    <!-- Button to submit the form -->
                                    <input type="submit" name="upload_design" value="Upload Design">
                                </form>
                            </div>

                        </div>

                    </div>
                    ';
                    } elseif ($component_has_colors !== 0) {
                        echo '
                        <form method="post" action="process_add_component_with_colors.php">
                            <input type="hidden" name="game_id" value="' . $game_id . '">
                            <input type="hidden" name="component_id" value="' . $component_id . '">
                
                            <!-- Add a quantity input for color-selected component -->
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" value="1" min="1" required>
                
                            <label for="selected_color">Select Color:</label>
                            <select id="selected_color" name="selected_color">';

                        $query_colors = "SELECT * FROM component_colors WHERE component_id = $component_id";
                        $result_colors = mysqli_query($conn, $query_colors);
                        while ($color = mysqli_fetch_assoc($result_colors)) {
                            echo '<option value="' . $color['color_id'] . '">' . $color['color_name'] . '</option>';
                        }
                        echo '
                            </select>
                
                            <input type="submit" name="add_with_colors" value="Add with Colors">dice
                        </form>
                        ';
                    }
                    ?>


                </div>
                <div class="col">

                    <?php
                    if ($component_has_colors == 0 && $is_upload_only == 0) {
                        echo '
                    
                        <div class="card">
                            <h5 class="card-header">Add Without Design</h5>
                            <div class="card-body">
                                <p class="card-text">Description</p>
                                <div class="container">
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="mb-3">
                                    <form method="post" action="process_direct_add_component.php">
                                        <input type="hidden" name="game_id" value="' . $game_id . '">
                                        <input type="hidden" name="component_id" value="' . $component_id . '">

                                        <!-- Quantity input -->
                                        <label for="quantity">Quantity:</label>
                                        <input type="number" id="quantity" name="quantity" value="1" min="1">

                                        <input type="submit" name="direct_add" value="Add Directly without Design">
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                    } elseif ($component_has_colors !== 0) {
                        echo '

                    ';
                    }
                    ?>


                </div>
            </div>

        </div>
    </section>
    <!-- End Sample Area -->



















    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

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



    <script>
        $(document).ready(function() {

            var swiper = new Swiper(".mySwiper", {
                // spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });



            $("#mySelect").change(function() {
                var selectedValue = $(this).val();
                var game_id = <?php echo $game_id; ?>;

                $.ajax({
                    type: "POST",
                    url: "process_navigate_size.php",
                    data: {
                        value: selectedValue,
                        game_id: game_id
                    },
                    success: function(response) {
                        console.log("AJAX request successful!");

                        // Construct the URL for the redirection
                        var redirectURL = "game_component_details.php?game_id=" + game_id + "&component_id=" + selectedValue;

                        // Redirect to the constructed URL
                        window.location.href = redirectURL;
                    },
                });
            });



        });
    </script>

</body>

</html>