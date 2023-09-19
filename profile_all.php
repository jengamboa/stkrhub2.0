<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>


    <!-- CSS ================================ -->
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

    <!-- List JS -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>




</head>

<body>
    <?php
    include 'connection.php';
    include 'html/page_header.php';
    ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Element Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Element</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link " href="profile_index.php">My Account</a>

                        <a class="nav-link active" href="profile_all.php">My Purchase</a>

                        <a class="nav-link " href="process_logout.php">Logout</a>


                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade " id="v-pills-myaccount" role="tabpanel" aria-labelledby="v-pills-myaccount-tab">

                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs">
                                    <a class="nav-item nav-link " href="profile_index.php">Profasdile</a>

                                    <a class="nav-item nav-link " href="profile_addresses.php">Addresses</a>

                                    <a class="nav-item nav-link active" href="profile_password.php">Change Password</a>
                                </div>
                            </nav>


                            <!-- /laman -->

                        </div>

                        <div class="tab-pane fade show active" id="v-pills-mypurchase" role="tabpanel" aria-labelledby="v-pills-mypurchase-tab">
                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" href="profile_all.php">All</a>

                                    <a class="nav-item nav-link" href="profile_pending.php">Pending</a>

                                    <a class="nav-item nav-link " href="profile_in_production.php">In Production</a>

                                    <a class="nav-item nav-link " href="profile_to_ship.php">To Ship</a>

                                    <a class="nav-item nav-link " href="profile_to_deliver.php">To Deliver</a>

                                    <a class="nav-item nav-link " href="profile_received.php">Received</a>

                                    <a class="nav-item nav-link " href="profile_canceled.php">Canceled</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active">
                                    <section style="padding: 20px;">
                                        <div class="container">

                                            <!-- laman -->
                                            <div id="test-list">
                                                <!-- <input type="text" class="search" /> -->
                                                <ul class="pagination" style="padding-bottom: 10px;"></ul>
                                                <ul class="list" style="display: flex; flex-direction: column; gap: 20px;">

                                                    <?php
                                                    $sqlAll = "SELECT * FROM orders WHERE user_id = $user_id";
                                                    $queryAll = $conn->query($sqlAll);
                                                    while ($fetchedAll = $queryAll->fetch_assoc()) {
                                                        $order_id = $fetchedAll['order_id'];
                                                        $cart_id = $fetchedAll['cart_id'];
                                                        $published_game_id = $fetchedAll['published_game_id'];
                                                        $built_game_id = $fetchedAll['built_game_id'];
                                                        $added_component_id = $fetchedAll['added_component_id'];
                                                        $quantity = $fetchedAll['quantity'];
                                                        $price = $fetchedAll['price'];
                                                        $order_date = $fetchedAll['order_date'];
                                                        $desired_markup = $fetchedAll['desired_markup'];
                                                        $manufacturer_profit = $fetchedAll['manufacturer_profit'];
                                                        $creator_profit = $fetchedAll['creator_profit'];
                                                        $marketplace_price = $fetchedAll['marketplace_price'];
                                                        $is_rated = $fetchedAll['is_rated'];

                                                        // address
                                                        $fullname = $fetchedAll['fullname'];
                                                        $number = $fetchedAll['number'];
                                                        $region = $fetchedAll['region'];
                                                        $province = $fetchedAll['province'];
                                                        $city = $fetchedAll['city'];
                                                        $barangay = $fetchedAll['barangay'];
                                                        $zip = $fetchedAll['zip'];
                                                        $street = $fetchedAll['street'];

                                                        $uniqueId = 'collapseCard_' . $order_id;

                                                        echo '
                                                            
                                                            <div class="card">
                                                                <div class="card-header">';

                                                        if ($published_game_id !== null) {
                                                            echo 'Published Game';
                                                        } elseif ($built_game_id !== null) {
                                                            echo 'Built Game';
                                                        } elseif ($added_component_id !== null) {
                                                            echo 'Game Component';
                                                        } else {
                                                            echo 'Error';
                                                        }

                                                        echo '
                                                                <button style="margin-left: 20px">
                                                                    View
                                                                </button>

                                                                </div>

                                                                <div class="card-body">';



                                                        

                                                            if ($published_game_id) {

                                                                $sqlPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                                                                $queryPublished = $conn->query($sqlPublished);
                                                                while ($fetchedPublished = $queryPublished->fetch_assoc()) {
                                                                    $built_game_id = $fetchedPublished['built_game_id'];
                                                                    $game_name = $fetchedPublished['game_name'];

                                                                    echo '
                                                                        <h5 class="card-title">'.$game_name.'</h5>
                                                                    ';
                                                                }
                                                                
                                                            } elseif ($built_game_id) {
                                                                
                                                                $sqlBuilt = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
                                                                $queryBuilt = $conn->query($sqlBuilt);
                                                                while ($fetchedBuilt = $queryBuilt->fetch_assoc()) {
                                                                    $game_id = $fetchedBuilt['game_id'];
                                                                    $name = $fetchedBuilt['name'];

                                                                    echo '
                                                                        <h5 class="card-title">'.$name.'</h5>
                                                                    ';
                                                                }

                                                            } elseif ($added_component_id) {
                                                                $sqlComponent = "SELECT * FROM built_games_added_game_components WHERE added_component_id = $added_component_id";
                                                                $queryComponent = $conn->query($sqlComponent);
                                                                while ($fetchedComponent = $queryComponent->fetch_assoc()){

                                                                    $component_id = $fetchedComponent['component_id'];

                                                                    


                                                                }

                                                                
                                                            } else {
                                                                echo '
                                                                        <h5 class="card-title">'.$component_id.'</h5>
                                                                    ';
                                                            }
                                                        

                                                        echo '
                                                                    
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                                </div>';


                                                        if ($published_game_id) {

                                                            echo '
                                                                        <div class="card-footer">
                                                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#' . $uniqueId . '">
                                                                                Toggle Card
                                                                            </button>
                                                                        </div>
                                                                        
                                                                        <div id="' . $uniqueId . '" class="collapse">
                                                                            <div class="card-body">
                                                                                <!-- Content for the collapsed card goes here -->
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <!-- Header for the inner card -->
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <!-- Content for the inner card goes here -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    ';
                                                        }

                                                        echo '
                                                            </div>
                                                        ';
                                                    }
                                                    ?>

                                                </ul>

                                            </div>
                                            <!-- /laman -->

                                        </div>
                                    </section>
                                </div>



                            </div>
                            <!-- /laman -->
                        </div>

                        <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
                            logout
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Sample Area -->




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
        var monkeyList = new List('test-list', {
            valueNames: ['name'],
            page: 7,
            pagination: true,

        });
    </script>


</body>

</html>