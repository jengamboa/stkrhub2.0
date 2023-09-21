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



    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include jQuery and Isotope.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/css/isotope.min.css">


    <style>
        <?php include 'css/body.css' ?>
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
            <div class="portfolioContainer mt-4" id="dynamicContent"></div>
        </div>
    </section>
    <!-- End Sample Area -->




    <div class="" style="max-width: 18rem;">
        <div class="card">
            <div class="card-header py-1">
                header ako
            </div>
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Hollywood Sign on The Hill" />
            <div class="card-body">
                <div class="mb-2 text-muted small">
                    <h5>asd</h5>
                    <span>Size</span><br>
                    <span>Price</span>
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
        $(document).ready(function() {
            var $container = $('.portfolioContainer');
            var $buttons = $('.categories');

            $container.isotope({
                filter: '*',
                layoutMode: 'masonry',
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

                        // Loop through the JSON data and create HTML elements
                        $.each(data, function(index, item) {


                            html += '<div class="item ' + item.category + '" style="max-width: 18rem;">';
                            html += '   <div class="card">';

                            html += '       <div class="card-header py-1">';
                            html += '           '+ item.category +'';
                            html += '       </div>';

                            html += '       <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Hollywood Sign on The Hill" />';

                            html += '       <div class="card-body">';
                            html += '           <div class="mb-2 text-muted small">';
                            html += '               <h5>'+ item.title +'</h5>';
                            html += '               <span>'+ item.size +'</span><br>';
                            html += '               <span>'+ item.price +'</span>';
                            html += '           </div>';
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
        });
    </script>

</body>

</html>