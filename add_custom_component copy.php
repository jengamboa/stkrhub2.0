<?php
session_start();
include 'connection.php';

if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];
}


$sqlGetGameInfo = "SELECT * FROM games WHERE game_id = $game_id";
$queryGetGameInfo = $conn->query($sqlGetGameInfo);

while ($fetchedGetGameInfo = $queryGetGameInfo->fetch_assoc()) {
    $name = $fetchedGetGameInfo['name'];
    $description = $fetchedGetGameInfo['description'];
    $created_at = $fetchedGetGameInfo['created_at'];
    $is_built = $fetchedGetGameInfo['is_built'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isotope.js Search and Filter</title>


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


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include jQuery and Isotope.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/css/isotope.min.css">


    <style>
        <?php include 'css/body.css' ?>.card-custom {
            overflow: hidden;
            height: 250px;
            /* Adjust the height as needed */
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-text {
            overflow-y: auto;
        }


        .card-custom-img {
            height: 200px;
            min-height: 200px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        .card-custom {
            overflow: hidden;
            height: 450px;
            /* Adjust the height as needed */
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-text {
            overflow-y: auto;
            /* Enable vertical scrolling for description text */
        }


        /* swiper */
        .swiper-slide {
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
    <?php include 'html/page_header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">
            <h5>Game Id: <?php echo $game_id ?></h5>
            <h5>Game Name: <?php echo $name ?></h5>
            <h5>Game Description: <?php echo $description ?></h5>
        </div>

        <div class="container">
            <div class="text-center">
                <!-- Filter buttons -->
                <button class="categories active" data-filter="*">All</button>

                <?php
                $sqlGetCategory = "SELECT * FROM game_components";
                $resultGetCategory = $conn->query($sqlGetCategory);

                while ($fetchedGetCategory = $resultGetCategory->fetch_assoc()) {
                    $fetched_component_id = $fetchedGetCategory['component_id'];
                    $fetched_component_name = $fetchedGetCategory['component_name'];
                    $fetched_description = $fetchedGetCategory['description'];
                    $fetched_price = $fetchedGetCategory['price'];
                    $fetched_category = $fetchedGetCategory['category'];
                    $fetched_assets = $fetchedGetCategory['assets'];
                    $fetched_has_colors = $fetchedGetCategory['has_colors'];
                    $fetched_size = $fetchedGetCategory['size'];

                    $fetched_category = str_replace(' ', '', $fetched_category);

                    echo '
                        <button class="categories" data-filter=".' . $fetched_category . '">' . $fetched_category . '</button>
                    ';
                }
                ?>
            </div>
            <!-- Add an empty container for the dynamic content -->
            <input type="text" id="searchInput" placeholder="Search...">

            <div class="container">
                <div class="portfolioContainer row pt-5 m-auto" id="dynamicContent">
                </div>
            </div>
    </section>
    <!-- End Sample Area -->



    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <?php $component_id = '<span id="componentIdPlaceholder"></span>'; echo $component_id;?>

                <div class="modal-body">

                    <div class="swiper-container" style="width: 200px;">
                        <!-- Swiper -->
                        <div class="swiper-outer">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    
                                    $component_id_int = (int)$component_id; // $num is now an integer (123)
                                    
                                    $sql = "SELECT * FROM component_assets WHERE component_id = $component_id_int AND is_thumbnail = 1";
                                    $result = $conn->query($sql);

                                    while ($fetched_banner = $result->fetch_assoc()) {
                                        $banner = $fetched_banner['asset_path'];

                                        echo '<div class="swiper-slide">';

                                        echo '<div class="image-banner-container">';
                                        echo '<img class="image-banner" src="' . $banner . '" alt="">';
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

            </div>
        </div>
    </div>




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





    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Initialize Swiper
        function displayComponentId(button) {
            const componentId = button.getAttribute("data-component_id");
            document.getElementById("componentIdPlaceholder").textContent = componentId;
        }

        // Initialize Swiper as you did in your previous code
        var mySwiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });




        var $container = $('.portfolioContainer');
        var $buttons = $('.categories');

        // $container.isotope({
        //     filter: '*',
        //     layoutMode: 'masonry',
        //     animationOptions: {
        //         duration: 750,
        //         easing: 'linear'
        //     }
        // });

        $container.isotope({
            itemSelector: '.item', // Specify the item selector
            layoutMode: 'masonry',
            masonry: {
                columnWidth: 210,
                columnHeight: 210,
                fitWidth: true,
            },
            animationOptions: {
                duration: 750,
                easing: 'linear'
            }
        });


        function loadData() {
            $.ajax({
                url: 'json_game_component_isotope.php', // Adjust the URL to your PHP script
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';

                    $.each(data, function(index, item) {


                        html += '<div class="col-md-6 col-lg-4 pb-3 ' + item.category + '">';
                        html += '   <div class="card card-custom " >';

                        html += '<a style="cursor: pointer;" data-component_id="' + item.component_id + '" data-toggle="modal" data-target="#imageModal" onclick="displayComponentId(this)">';
                        html += '<div class="card-custom-img" style="background-image: url(\'' + item.thumbnail + '\');"></div>';
                        html += '</a>';





                        html += '       <div class="card-body" style="overflow-y: auto">';
                        html += '           <h4 class="card-title">' + item.title + '</h4>';
                        html += '           <h6 class="card-subtitle mb-2 text-muted">' + item.real_category + '</h6>';
                        html += '           <h6 class="card-subtitle mb-2 text-muted">' + item.size + '</h6>';
                        html += '           <h6 class="card-subtitle mb-2 text-muted">' + item.price + '</h6>';
                        html += '           <p class="card-text">' + item.description + '</p>';
                        html += '       </div>';

                        html += '       <div class="card-footer" style="background: inherit; border-color: inherit;">';
                        html += '           <a href="#" class="btn btn-primary">Option</a>';
                        html += '           <a href="#" class="btn btn-outline-primary">Other option</a>';
                        html += '       </div>';

                        html += '   </div>';
                        html += '</div>';
                    });

                    // Update the Isotope container with new content
                    $('#dynamicContent').html(html);

                    // Reinitialize Isotope after updating the content
                    $container.isotope('destroy').isotope({
                        filter: '*',
                        layoutMode: 'masonry',
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                        },
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                },
            });
        }

        loadData();

        $('.categories').on('click', function() {
            var filterValue = $(this).data('filter');

            $buttons.removeClass('active');
            $(this).addClass('active');

            $container.isotope({
                filter: filterValue,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                },
            });
        });

        // Get a reference to the search input field
        var $searchInput = $('#searchInput');

        // Listen for keyup event on the search input
        $searchInput.on('keyup', function() {
            var searchValue = $(this).val().toLowerCase(); // Get the lowercase search query

            // Use Isotope's filter function to filter items
            $container.isotope({
                filter: function() {
                    var itemText = $(this).text().toLowerCase(); // Get lowercase text of item
                    return itemText.includes(searchValue); // Check if item contains the search query
                }
            });
        });


        // Listen for keyup event on the search input
        $searchInput.on('keyup', function() {
            var searchValue = $(this).val().toLowerCase(); // Get the lowercase search query

            // Use Isotope's filter function to filter items
            $container.isotope({
                filter: function() {
                    var itemText = $(this).text().toLowerCase(); // Get lowercase text of item
                    return itemText.includes(searchValue); // Check if item contains the search query
                }
            });

            // Reset the filter if the search input is empty
            if (!searchValue) {
                $container.isotope({
                    filter: '*'
                });
            }
        });
    </script>

</body>

</html>