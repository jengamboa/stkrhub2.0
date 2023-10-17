<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['built_game_id'])) {
    $built_game_id = $_GET['built_game_id'];
}


$sqlGetGameDetails = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
$queryGetGameDetails = $conn->query($sqlGetGameDetails);
while ($fetchedGetGameDetails = $queryGetGameDetails->fetch_assoc()) {
    $game_id = $fetchedGetGameDetails['game_id'];
    $name = $fetchedGetGameDetails['name'];
    $description = $fetchedGetGameDetails['description'];
    $build_date = $fetchedGetGameDetails['build_date'];
    $is_pending =     $fetchedGetGameDetails['is_pending'];
    $is_canceled = $fetchedGetGameDetails['is_canceled'];
    $is_approved = $fetchedGetGameDetails['is_approved'];
    $is_purchased = $fetchedGetGameDetails['is_purchased'];
    $is_published = $fetchedGetGameDetails['is_published'];
    $price = $fetchedGetGameDetails['price'];

    if ($is_pending == 1) {
        $status_value = 'PENDING';
    } elseif ($is_canceled == 1) {
        $status_value = 'CANCELED';
    } elseif ($is_approved == 1) {
        $status_value = 'APPROVED';
    } elseif ($is_purchased == 1) {
        $status_value = 'PURCHASED';
    } elseif ($is_published == 1) {
        $status_value = 'PUBLISHED';
    } else {
        $status_value = '';
    }

    $status = $status_value;
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


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <h5>Game Id: <?php echo $built_game_id ?></h5>
            <h5>Game Name: <?php echo $name ?></h5>
            <h5>Game Description: <?php echo $description ?></h5>
            <h5>Built Date: <?php echo $build_date ?></h5>
            <h5>Price: <?php echo $price ?></h5>
            <h5>Status: <?php echo $status ?></h5>
        </div>


        <div class="container">
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

    </section>
    <!-- End Sample Area -->

    <section class="sample-text-area">

    </section>





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



        });
    </script>

</body>

</html>