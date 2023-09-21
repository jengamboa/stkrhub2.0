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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Include Tippy.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css">




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

                            <div class="tab-content" id="nav-tabContent">


                            </div>
                            <!-- /laman -->

                        </div>

                        <div class="tab-pane fade show active" id="v-pills-mypurchase" role="tabpanel" aria-labelledby="v-pills-mypurchase-tab">
                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" href="profile_all.php">All</a>

                                    <a class="nav-item nav-link " href="profile_pending.php">Pending</a>

                                    <a class="nav-item nav-link " href="profile_in_production.php">In Production</a>

                                    <a class="nav-item nav-link " href="profile_to_deliver.php">To Deliver</a>

                                    <a class="nav-item nav-link " href="profile_received.php">Received</a>

                                    <a class="nav-item nav-link " href="profile_canceled.php">Canceled</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">


                                <div class="tab-pane fade show active">
                                    <section style="padding: 20px;">
                                        <div class="container">



                                            <div id="test-list">
                                                <input type="text" class="search" />
                                                <ul class="pagination"></ul>

                                                <ul class="list">



                                                    <!-- START -->
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
                                                        $is_pending = $fetchedAll['is_pending'];
                                                        $in_production = $fetchedAll['in_production'];
                                                        $to_deliver = $fetchedAll['to_deliver'];
                                                        $is_received = $fetchedAll['is_received'];
                                                        $is_canceled = $fetchedAll['is_canceled'];
                                                        $is_completely_canceled = $fetchedAll['is_completely_canceled'];
                                                        $order_date = $fetchedAll['order_date'];
                                                        $desired_markup = $fetchedAll['desired_markup'];
                                                        $manufacturer_profit = $fetchedAll['manufacturer_profit'];
                                                        $creator_profit = $fetchedAll['creator_profit'];
                                                        $marketplace_price = $fetchedAll['marketplace_price'];
                                                        $is_rated = $fetchedAll['is_rated'];
                                                        $fullname = $fetchedAll['fullname'];
                                                        $number = $fetchedAll['number'];
                                                        $region = $fetchedAll['region'];
                                                        $city = $fetchedAll['city'];
                                                        $barangay = $fetchedAll['barangay'];
                                                        $zip = $fetchedAll['zip'];
                                                        $street = $fetchedAll['street'];

                                                        if ($is_pending){
                                                            $status = 'PENDING';

                                                        } elseif ($in_production){
                                                            $status = 'IN PRODUCTION';

                                                        } elseif ($to_deliver){
                                                            $status = 'TO DELIVER';

                                                        } elseif ($is_received){
                                                            $status = 'RECEIVED';

                                                        } elseif ($is_canceled){
                                                            $status = 'CANCELED';

                                                        } 

                                                        echo '
                                                        
                                                        <div class="card shadow-0 border rounded-3 mt-3">


                                                            <div class="card-header p-0 py-1">
                                                                <ul class="nav">';

                                                                    if ($published_game_id) {
                                                                        echo '                                                                    
                                                                            <li class="nav-link">
                                                                                Published Game
                                                                            </li>

                                                                            <li class="nav-item ml-auto">
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link">ORDER ID: '.$order_id.'</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link">'.$status.'</a>
                                                                                </li>
                                                                            </li>
                                                                        ';
                                                                        
                                                                        
                                                                    } elseif ($built_game_id) {
                                                                        echo '                                                                    
                                                                            <li class="nav-link">
                                                                                Built Game
                                                                            </li>

                                                                            <li class="nav-item ml-auto">
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link">ORDER ID: '.$order_id.'</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link">'.$status.'</a>
                                                                                </li>
                                                                            </li>
                                                                        ';

                                                                    } elseif ($added_component_id) {
                                                                        echo '                                                                    
                                                                            <li class="nav-link">
                                                                                Game Component
                                                                            </li>

                                                                            <li class="nav-item ml-auto">
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link">ORDER ID: '.$order_id.'</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link">'.$status.'</a>
                                                                                </li>
                                                                            </li>
                                                                        ';
                                                                        
                                                                    }

                                                                echo'
                                                                </ul>
                                                            </div>


                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">';

                                                                        

                                                                            if ($published_game_id) {

                                                                                $sqlImgPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                                                                                $queryImgPublished = $conn->query($sqlImgPublished);
                                                                                while ($fetchedImgPublished = $queryImgPublished->fetch_assoc()) {
                                                                                    $logo_path = $fetchedImgPublished['logo_path'];
                                                                                    $category = $fetchedImgPublished['category'];
                                                                                    $edition = $fetchedImgPublished['edition'];
                                                                                    

                                                                                    echo '
                                                                                        <div 
                                                                                            style="
                                                                                                overflow: hidden;
                                                                                                width: 100%;
                                                                                    
                                                                                    
                                                                                                position: relative;
                                                                                                padding-top: 45.25%;
                                                                                        ">                                                                    
                                                                                            <img src="'.$logo_path.'" 
                                                                                                style="
                                                                                                    position: absolute;
                                                                                                    top: 0;
                                                                                                    left: 0;
                                                                                        
                                                                                                    height: 100%;
                                                                                                    width: 100%;
                                                                                                    object-fit: cover;
                                                                                                "/>
                                                                                        </div>
                                                                                    ';
                                                                                }

                                                                                
                                                                            } elseif ($built_game_id) {
                                                                                $sqlConstantBuiltG = "SELECT * FROM constants";
                                                                                $queryConstantBuiltG = $conn->query($sqlConstantBuiltG);
                                                                                while ($fetchedConstantBuiltG = $queryConstantBuiltG->fetch_assoc()) {
                                                                                    $constant_id = $fetchedConstantBuiltG['constant_id'];
                                                                                    $image_path = $fetchedConstantBuiltG['image_path'];

                                                                                    $constant_built_game = $image_path;

                                                                                    echo '
                                                                                        <img src="'.$constant_built_game.'" 
                                                                                            style="
                                                                                                position: absolute;
                                                                                                top: 0;
                                                                                                left: 0;
                                                                                                height: 100%;
                                                                                                width: 100%;
                                                                                                object-fit: cover;
                                                                                            "/>
                                                                                    ';
                                                                                }

                                                                            } elseif ($added_component_id) {
                                                                                $sqlGetComponentId = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
                                                                                $queryGetComponentId = $conn->query($sqlGetComponentId);
                                                                                
                                                                                if ($queryGetComponentId) {
                                                                                    $fetchedGetComponent = $queryGetComponentId->fetch_assoc();
                                                                                    $fetched_component_id = $fetchedGetComponent['component_id'];
                                                                                    $is_custom_design = $fetchedGetComponent['is_custom_design'];
                                                                                    $custom_design_file_path = $fetchedGetComponent['custom_design_file_path'];
                                                                            
                                                                                    $sqlConstantComponent = "SELECT * FROM component_assets WHERE component_id = $fetched_component_id AND is_thumbnail = 1";
                                                                                    $queryConstantComponent = $conn->query($sqlConstantComponent);
                                                                            
                                                                                    if ($queryConstantComponent) {
                                                                                        $fetchedConstantComponent = $queryConstantComponent->fetch_assoc();
                                                                                        $asset_path = $fetchedConstantComponent['asset_path'];
                                                                                        
                                                                                        echo '
                                                                                            <img src="'.$asset_path.'" 
                                                                                                style="
                                                                                                    position: absolute;
                                                                                                    top: 0;
                                                                                                    left: 0;
                                                                                                    height: 100%;
                                                                                                    width: 100%;
                                                                                                    object-fit: cover;
                                                                                                "/>
                                                                                        ';
                                                                                    }
                                                                                }
                                                                            }
                                                                            


                                                                            

                                                                        echo'
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-lg-6 col-xl-6">';

                                                                        

                                                                        if ($published_game_id) {

                                                                            $sqlGetTitle = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                                                                            $queryGetTitle = $conn->query($sqlGetTitle);
                                                                            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                                                                                $fetched_title = $fetchedGetTitle['game_name'];

                                                                                echo '                                                                    
                                                                                    <h5>'.$fetched_title.'</h5>
                                                                                ';
                                                                            }

                                                                        } elseif ($built_game_id) {
                                                                            $sqlGetTitle = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
                                                                            $queryGetTitle = $conn->query($sqlGetTitle);
                                                                            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                                                                                $fetched_title = $fetchedGetTitle['name'];

                                                                                echo '                                                                    
                                                                                    <h5>'.$fetched_title.'</h5>
                                                                                ';
                                                                            }

                                                                        } elseif ($added_component_id) {
                                                                            $sqlGetComponentID = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
                                                                            $queryGetComponentID = $conn->query($sqlGetComponentID);
                                                                            while ($fetchedGetComponentID = $queryGetComponentID->fetch_assoc()) {
                                                                                $fetched_component_id = $fetchedGetComponentID['component_id'];

                                                                                $sqlGetTitle = "SELECT * FROM game_components WHERE component_id = $fetched_component_id";
                                                                                $queryGetTitle = $conn->query($sqlGetTitle);
                                                                                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                                                                                    $fetched_title = $fetchedGetTitle['component_name'];
                                                                                    $fetched_category = $fetchedGetTitle['category'];
                                                                                    $fetched_size = $fetchedGetTitle['size'];

                                                                                    echo '                                                                    
                                                                                        <h5>'.$fetched_title.'</h5>
                                                                                    ';
                                                                                    }
                                                                            }
                                                                            
                                                                        }

                                                                        
                                                                        if ($published_game_id){
                                                                            echo '
                                                                                <div class="d-flex flex-row">
                                                                                    <div class="text-danger mb-1 me-2">';

                                                                                        $rating = "SELECT rating FROM ratings WHERE published_game_id = $published_game_id";
                                                                                        $sqlGetRating = $conn->query($rating);
                                                                                        $ratingsArray = [];
                                                                                        while ($fetchedRating = $sqlGetRating->fetch_assoc()) {
                                                                                        $ratingsArray[] = $fetchedRating['rating'];
                                                                                        }
                                                                                    
                                                                                        $ratingCounts = array(
                                                                                        '5' => 0,
                                                                                        '4' => 0,
                                                                                        '3' => 0,
                                                                                        '2' => 0,
                                                                                        '1' => 0
                                                                                        );
                                                                                    
                                                                                        foreach ($ratingsArray as $ratingValue) {
                                                                                        if (array_key_exists($ratingValue, $ratingCounts)) {
                                                                                            $ratingCounts[$ratingValue]++;
                                                                                        }
                                                                                        }
                                                                                    
                                                                                    
                                                                                        $count5 = $ratingCounts['5'];
                                                                                        $count4 = $ratingCounts['4'];
                                                                                        $count3 = $ratingCounts['3'];
                                                                                        $count2 = $ratingCounts['2'];
                                                                                        $count1 = $ratingCounts['1'];
                                                                                    
                                                                                        $ratingSum = array_sum($ratingsArray);
                                                                                        $ratingCount = count($ratingsArray);

                                                                                        if ($ratingCount > 0) {
                                                                                            $averageRating = $ratingSum / $ratingCount;
                                                                                            $averageRating = number_format($averageRating, 2); // Round to 2 decimal places

                                                                                            // Extract the whole number and decimal part
                                                                                            $whole = floor($averageRating);
                                                                                            $decimal = ($averageRating - $whole) * 100; // Convert decimal part to 0-100 range
                                                                                        } else {
                                                                                            $averageRating = 0;
                                                                                            $whole = 0;
                                                                                            $decimal = 0;
                                                                                        }

                                                                                        if ($decimal >= 0 && $decimal <= 44) {
                                                                                            $new_whole = $whole;
                                                                                            $new_decimal = 0;
                                                                                            
                                                                                        } elseif ($decimal >= 45 && $decimal <= 94) {
                                                                                            $new_whole = $whole;
                                                                                            $new_decimal = .5;

                                                                                        } elseif ($decimal >= 95 && $decimal <= 99) {
                                                                                            $new_whole = $whole + 1;
                                                                                            $new_decimal = 0;

                                                                                        } 

                                                                                        for ($i = 0; $i < $new_whole; $i++) {
                                                                                            echo '<i class="fa fa-star"></i>';
                                                                                        }

                                                                                        for ($i = 0; $i < $new_decimal; $i++) {
                                                                                            echo '<i class="fa-solid fa-star-half-stroke"></i>';
                                                                                        }

                                                                                        

                                                                                    echo '
                                                                                    </div>
                                                                                    <span>
                                                                                        '.$new_whole + $new_decimal.'
                                                                                    </span>
                                                                                </div>
                                                                            ';

                                                                        }
                                                                        

                                                                        if ($published_game_id){

                                                                            

                                                                            echo '
                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Game Category: '.$category.'</span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Game Edition: '.$edition.'</span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span><i class="fa-solid fa-peso-sign"></i>'.$marketplace_price.' </span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Quantity: x'.$quantity.'</span>
                                                                            </div>
                                                                            ';


                                                                        } elseif ($built_game_id){
                                                                            echo '
                                                                            
                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span><i class="fa-solid fa-peso-sign"></i>'.$price.' </span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Quantity: x'.$quantity.'</span>
                                                                            </div>
                                                                            ';

                                                                        } elseif ($added_component_id){
                                                                            echo '
                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Category: '.$fetched_category.'</span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Size: '.$fetched_size.'</span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span><i class="fa-solid fa-peso-sign"></i>'.$price.' </span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Quantity: x'.$quantity.'</span>
                                                                            </div>

                                                                            <div class="mt-1 mb-0 text-muted">
                                                                                <span>Custom Design: ';

                                                                                    if ($is_custom_design == 0) {
                                                                                        echo 'None';
                                                                                    } elseif ($is_custom_design == 1) {
                                                                                        $custom_design_file_path = "uploads/kids award.docx";

                                                                                        $filename = basename($custom_design_file_path);
                                                                                        echo '<a href="' . $custom_design_file_path . '" download="' . $filename . '"><i class="fa-solid fa-download"></i> ' . $filename . '</a>';
                                                                                    }

                                                                                echo'
                                                                                </span>
                                                                            </div>
                                                                            ';

                                                                        }
                                                                        
                                                                        

                                                                        echo '
                                                                    </div>

                                                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                                        <h6 class="text-primary">Order Total: </h6>
                                                                        <div class="d-flex flex-row align-items-center mb-1">
                                                                            <h4 class="mb-1 me-1">$14.99</h4>
                                                                        </div>

                                                                        <div class="d-flex flex-column mt-4">';

                                                                            if ($published_game_id) {
                                                                                echo '
                                                                                    <button class="btn btn-primary btn-sm" type="button">Details</button>';

                                                                                if ($status == 'PENDING') {
                                                                                    echo '
                                                                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                                                            Cancel
                                                                                        </button>
                                                                                    ';
                                                                                } else {
                                                                                    echo '
                                                                                        <p class="font-weight-light font-italic small">You cannot Cancel an order once it was on In Production</p>
                                                                                    ';
                                                                                }

                                                                                
                                                                            } elseif ($built_game_id){
                                                                                echo '
                                                                                    <button class="btn btn-primary btn-sm" type="button">Details</button>';

                                                                                if ($status == 'PENDING') {
                                                                                    echo '
                                                                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                                                            Cancel
                                                                                        </button>
                                                                                    ';
                                                                                } else {
                                                                                    echo '
                                                                                        <p class="font-weight-light font-italic small">You cannot Cancel an order once it was on In Production</p>
                                                                                    ';
                                                                                }

                                                                            } elseif ($added_component_id){
                                                                                echo '
                                                                                    <button class="btn btn-primary btn-sm" type="button">Details</button>';

                                                                                if ($status == 'PENDING') {
                                                                                    echo '
                                                                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                                                            Cancel
                                                                                        </button>
                                                                                    ';
                                                                                } else {
                                                                                    echo '
                                                                                        <p class="font-weight-light font-italic small">You cannot Cancel an order once it was on In Production</p>
                                                                                    ';
                                                                                }

                                                                            }

                                                                        echo'
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>';


                                                            

                                                            if ($built_game_id){
                                                                echo '
                                                                <div class="card-footer py-1">

                                                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapseExample'.$order_id.'" aria-expanded="false" aria-controls="collapseExample">
                                                                        <i class="fas fa-chevron-down"></i> Show Added Game Components
                                                                    </a>

                                                                    <div class="collapse" id="collapseExample'.$order_id.'">
                                                                        <div class="card card-body">';

                                                                                            $sqlGetComponents = "SELECT * FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
                                                                                            $queryGetComponents = $conn->query($sqlGetComponents);
                                                                                            while ($fetchedGetComponents = $queryGetComponents->fetch_assoc()) {
                                                                                                $fetchedGetComponent_component_id = $fetchedGetComponents['component_id'];
                                                                                                $fetchedGetComponent_quantity = $fetchedGetComponents['quantity'];

                                                                                                echo '
                                                                                                    <div id="game_components_table">
                                                                                                    <table>
                                                                                                    <tbody class="list">
                                                                                                    <tr>
                                                                                                        <td class="component_id">
                                                                                                            '. $fetchedGetComponent_component_id.'
                                                                                                        </td>

                                                                                                        <td class="component_id">';
                                                                                                            $sqlGetComponentsInfo = "SELECT * FROM game_components WHERE component_id = $fetchedGetComponent_component_id";
                                                                                                            $queryGetComponentsInfo = $conn->query($sqlGetComponentsInfo);
                                                                                                            while ($fetchedComponentsInfo = $queryGetComponentsInfo->fetch_assoc()) {
                                                                                                                $fci_component_name = $fetchedComponentsInfo['component_name'];
                                                                                                                $fci_price = $fetchedComponentsInfo['price'];
                                                                                                                $fci_category = $fetchedComponentsInfo['category'];
                                                                                                                $fci_has_colors = $fetchedComponentsInfo['has_colors'];
                                                                                                                $fci_size = $fetchedComponentsInfo['size'];

                                                                                                                echo $fci_component_name;
                                                                                                                
                                                                                                            }


                                                                                                        echo'    
                                                                                                        </td>

                                                                                                        <td class="component_id">
                                                                                                            '. $fetchedGetComponent_quantity.'
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    </tbody>
                                                                                                    </table>
                                                                                                    </div>
                                                                                                ';
                                                                                            }

                                                                        echo'
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                ';
                                                            }






                                                            
                                                        echo'
                                                        </div>


                                                        ';
                                                        
                                                    }
                                                    

                                                    ?>


                                                    


                                                    <!-- END -->

                                                </ul>

                                            </div>




















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

    <!-- Include Tippy.js JavaScript -->
    <script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.js"></script>


    <script>
        var monkeyList = new List('test-list', {
            valueNames: ['name'],
            page: 7,
            pagination: true
        });


        var options = {
            valueNames: [ 'name', 'born' ]
        };

        var userList = new List('game_components_table', options);
    </script>





</body>

</html>