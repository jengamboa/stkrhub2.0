<?php
session_start();
include 'connection.php';

$game_id = $_GET['game_id'];

$sqlGetPendingPublishRequest = "SELECT * FROM games WHERE game_id = $game_id";
$queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
while ($fetchedGames = $queryGetPendingPublishRequest->fetch_assoc()) {
    $game_id = $fetchedGames['game_id'];
    $name = $fetchedGames['name'];
    $description = $fetchedGames['description'];
    $user_id = $fetchedGames['user_id'];
    $created_at = $fetchedGames['created_at'];
    $is_built = $fetchedGames['is_built'];
    $is_pending = $fetchedGames['is_pending'];
    $to_approve = $fetchedGames['to_approve'];
    $is_denied = $fetchedGames['is_denied'];
    $is_approved = $fetchedGames['is_approved'];
}


// SQL query to retrieve added components and their prices for a specific game
$sqlComponents = "SELECT 
    agc.added_component_id,
    agc.quantity,
    gc.price
    FROM added_game_components AS agc
    INNER JOIN game_components AS gc ON agc.component_id = gc.component_id
    WHERE agc.game_id = $game_id";

$resultComponents = $conn->query($sqlComponents);

$totalPrice = 0;

while ($fetchedComponents = $resultComponents->fetch_assoc()) {
    $quantity = $fetchedComponents['quantity'];
    $price = $fetchedComponents['price'];

    // Calculate the total price for this added component
    $componentTotalPrice = $quantity * $price;

    // Add the component's total price to the game's total price
    $totalPrice += $componentTotalPrice;
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
                        <h4></h4>
                        <ul class="list">
                            <!-- <li><a href="#"><span>Order number</span> : 60235</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm">

                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Catgories</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a class=" justify-content-between">
                                            <p>Game Name: </p>
                                            <p>
                                                <?php echo $name ?>
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class=" justify-content-between">
                                            <p>Description: </p>
                                            <p>
                                                <?php echo $description ?>
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Price: </p>
                                            <p>
                                                <?php echo $totalPrice ?>
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Status: </p>
                                            <p>
                                                <?php if ($to_approve == 1) {
                                                    echo 'TO APPROVE';
                                                } ?>
                                            </p>
                                        </a>
                                    </li>

                                </ul>

                            </aside>


                        </div>

                    </div>

                    <div class="col-sm">
                        <!-- DataTables Game Components -->
                        <table id="gameTable" class="display">
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
                        <button id="approvePublish" data-game_id="<?php echo $game_id; ?>">Approve Publish
                            Request</button>

                        <button id="denyGame" data-game_id="<?php echo $game_id; ?>">Deny</button>
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
            var game_id = <?php echo $game_id; ?>;

            $('#gameTable').DataTable({
                "ajax": {
                    "url": "admin_json_game_dashboard.php",
                    data: {
                        user_id: user_id,
                        game_id: game_id,
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

                var game_id = $(this).data('game_id');

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
                            url: 'admin_process_approve_game_request.php',
                            type: 'POST',
                            data: {
                                user_id: user_id,
                                game_id: game_id,
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
            $('#denyGame').on('click', function() {
                const game_id = $(this).data('game_id');
                const ticket_id = $(this).data('ticket_id');

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
                        formData.append('gameId', game_id);
                        formData.append('ticket_id', ticket_id);
                        formData.append('reason', denyReason);
                        formData.append('file', file);

                        // Send the AJAX request to the server
                        return $.ajax({
                            url: 'admin_process_deny_game_request.php',
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
                                    window.location.href = 'admin_has_pending_approve_games.php';
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