<?php
session_start();
include 'connection.php';

$built_game_id = $_GET['built_game_id'];

// Retrieve the markup percentage from the database
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$query = "SELECT built_game_id, name, description, game_id, creator_id, price, is_published, is_purchased, is_pending_published FROM built_games WHERE built_game_id = '$built_game_id'";
$result = mysqli_query($conn, $query);

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

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

    </style>
</head>

<body>

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

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="row">


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


                            <div class="single-post row">

                                <div class="col-lg-12">

                                    <div class="row">
                                        <div class="col-lg-12 mt-25">

                                            <div class="container">
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

                                                <h5>Logo:</h5>
                                                <img src="<?php echo $logo_path ?>" alt="">
                                                <br>

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

                                                <?php
                                                $imageQuery = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = '$built_game_id'";
                                                $imageResult = mysqli_query($conn, $imageQuery);

                                                echo '<h2>Game Images</h2>';
                                                while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                                                    $imagePath = $imageRow['file_path'];
                                                    echo '<img src="' . $imagePath . '" alt="Game Image">';
                                                }
                                                ?>

                                                <button id="cancelButton" data-built-game-id="<?php echo $built_game_id; ?>">Cancel Details
                                                    Request</button>


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="col-sm">
                        <!-- DataTables Game Components -->
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
                                <!-- User data will be displayed here -->
                            </tbody>
                        </table>
                        <!-- /DataTables Game Components -->
                    </div>

                    <div class="col-sm">
                        <button id="approvePublish" data-built-game-id="<?php echo $built_game_id; ?>">Approve Publish
                            Request</button>

                        <button id="cancelPublish" data-built-game-id="<?php echo $built_game_id; ?>">Cancel Publish
                            Request</button>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
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

    <!-- Filepond JavaScript -->
    <script src="https://unpkg.com/filepond@4.23.1/dist/filepond.min.js"></script>


    <script>
        $(document).ready(function() {



            var user_id = <?php echo $user_id; ?>;
            var built_game_id = <?php echo $built_game_id; ?>;

            $('#builtGameTable').DataTable({
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


            $('#approvePublish').click(function() {

                var built_game_id = $(this).data('built-game-id');

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
                                built_game_id: built_game_id
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




            // Attach a click event handler to the button by its id
            $('#cancelPublish').on('click', function() {
                const builtGameId = $(this).data('built-game-id');

                // Create a SweetAlert pop-up with an input field for reasons and a file upload field
                Swal.fire({
                    title: 'Deny Publish Request',
                    html: '<input type="text" id="denyReason" class="swal2-input" placeholder="Enter reasons for denial" required>' +
                        '<input type="file" id="fileUpload" class="swal2-input" accept=".pdf,.jpg,.jpeg,.png">',
                    showCancelButton: true,
                    confirmButtonText: 'Deny',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        // Handle the input (reason and file) here, e.g., send them to the server
                        const denyReason = $('#denyReason').val();
                        const file = $('#fileUpload').prop('files')[0];

                        // Check if the input field is empty
                        if (!denyReason) {
                            Swal.showValidationMessage('Reason is required');
                            return false; // Prevent the SweetAlert from closing
                        }

                        // Create a FormData object to send both text and file data
                        const formData = new FormData();
                        formData.append('gameId', builtGameId);
                        formData.append('reason', denyReason);
                        formData.append('file', file);

                        // Send the AJAX request to the server
                        return $.ajax({
                            url: 'admin_process_deny_publish_request.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
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
                            error: function(xhr, status, error) {
                                Swal.fire('Error', 'An error occurred while processing the request.', 'error');
                            }
                        });
                    }
                });
            });


        });
    </script>

</body>

</html>