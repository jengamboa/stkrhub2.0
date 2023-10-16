<?php
include 'connection.php';

$built_game_id = $_GET['built_game_id'];
$creator_id = $_GET['creator_id'];

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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Games Approval Requests</h4>
                            <p class="mb-0">Users are now expeting the their order is being processed.</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

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
                                                                        echo '<img src="../' . $imagePath . '" alt="Game Image">';
                                                                    }
                                                                    ?>

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
                                                </tbody>
                                            </table>
                                            <!-- /DataTables Game Components -->
                                        </div>

                                        <div class="col-sm">
                                            <button id="approvePublish" data-built-game-id="<?php echo $built_game_id; ?>">Approve Publish
                                                Request</button>

                                            <button id="cancelPublish" data-built-game-id="<?php echo $built_game_id; ?>">Deny Publish
                                                Request</button>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>



    </div>








    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {

            var creator_id = <?php echo $creator_id; ?>;
            var built_game_id = <?php echo $built_game_id; ?>;

            $('#builtGameTable').DataTable({
                "ajax": {
                    "url": "admin_json_built_game_dashboard.php",
                    data: {
                        creator_id: creator_id,
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
                                    window.location.href = '';
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