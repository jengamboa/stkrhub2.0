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

                                            <!-- 
                                            <div id="test-list">
                                                
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
                                                                $category = $fetchedPublished['category'];
                                                                $edition = $fetchedPublished['edition'];
                                                                $published_date = $fetchedPublished['published_date'];
                                                                $creator_id = $fetchedPublished['creator_id'];
                                                                $logo_path = $fetchedPublished['logo_path'];
                                                                $marketplace_price = $fetchedPublished['marketplace_price'];
                                                                

                                                                echo '
                                                                        <h5 class="card-title">' . $game_name . '</h5>
                                                                    ';
                                                            }
                                                        } elseif ($built_game_id) {

                                                            $sqlBuilt = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
                                                            $queryBuilt = $conn->query($sqlBuilt);
                                                            while ($fetchedBuilt = $queryBuilt->fetch_assoc()) {
                                                                $game_id = $fetchedBuilt['game_id'];
                                                                $name = $fetchedBuilt['name'];

                                                                echo '
                                                                        <h5 class="card-title">' . $name . '</h5>
                                                                    ';
                                                            }
                                                        } elseif ($added_component_id) {

                                                            $sqlGetComponentId = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
                                                            $queryGetComponentId = $conn->query($sqlGetComponentId);
                                                            while ($fetchedGetComponentId = $queryGetComponentId->fetch_assoc()) {
                                                                $this_component_id = $fetchedGetComponentId['component_id'];

                                                                $sqlComponentName = "SELECT * FROM game_components WHERE component_id = $this_component_id";
                                                                $queryComponentName = $conn->query($sqlComponentName);
                                                                while ($fetchedComponentName = $queryComponentName->fetch_assoc()) {
                                                                    $component_name = $fetchedComponentName['component_name'];

                                                                    echo '<h4>' . $component_name . '</h4>';
                                                                }
                                                            }
                                                        }


                                                        if ($published_game_id) {
                                                            echo '<p class="card-text">published game id toh.</p>';
                                                        } elseif ($built_game_id) {
                                                            echo '<p class="card-text">built game id toh.</p>';
                                                        } elseif ($added_component_id) {

                                                            $sqlGetComponentId = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
                                                            $queryGetComponentId = $conn->query($sqlGetComponentId);
                                                            while ($fetchedGetComponentId = $queryGetComponentId->fetch_assoc()) {
                                                                $this_component_id = $fetchedGetComponentId['component_id'];
                                                                $color_id = $fetchedGetComponentId['color_id'];
                                                                $size = $fetchedGetComponentId['size'];
                                                                $quantity = $fetchedGetComponentId['quantity'];

                                                                $sqlComponentDetails = "SELECT * FROM game_components WHERE component_id = $this_component_id";
                                                                $queryComponentDetails = $conn->query($sqlComponentDetails);
                                                                while ($fetchedComponentDetails = $queryComponentDetails->fetch_assoc()) {
                                                                    $component_category = $fetchedComponentDetails['category'];
                                                                    $has_colors = $fetchedComponentDetails['has_colors'];



                                                                    if ($has_colors == 0) {
                                                                    } elseif ($has_colors == 1) {


                                                                        $sqlColor = "SELECT * FROM component_colors WHERE color_id = $color_id";
                                                                        $queryColor = $conn->query($sqlColor);
                                                                        while ($fetchedColor = $queryColor->fetch_assoc()) {
                                                                            $color_id = $fetchedColor['color_id'];
                                                                            $color_name = $fetchedColor['color_name'];

                                                                            echo '<p>Category: ' . $component_category . '</p>';
                                                                            echo '<p>Quantity: ' . $quantity . '</p>';
                                                                            echo '<p>Color: ' . $color_name . '</p>';
                                                                            echo '<p>Size: ' . $size . '</p>';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            echo 'Error';
                                                        }


                                                        echo '
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
                                             -->

                                            <div id="test-list">
                                                <ul class="pagination" style="padding-bottom: 10px;"></ul>
                                                <ul class="list" style="display: flex; flex-direction: column; gap: 20px;">

                                                    <!-- laman -->
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
                                                        <div class="card shadow-0 border rounded-3">

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
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">';
                                                            

                                                                

                                                                        if ($published_game_id !== null) {
                                                                            echo '
                                                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">

                                                                                    <div style="
                                                                                        overflow: hidden;
                                                                                        width: 100%;
                                                                                
                                                                                        position: relative;
                                                                                        padding-top: 45.25%;
                                                                                        /* 9/16 aspect ratio (16:9) */o
                                                                                    ">
                                                                                        <img 
                                                                                            src="'.$logo_path.'" 
                                                                                            class="w-100"
                                                                                            style="
                                                                                                position: absolute;
                                                                                                top: 0;
                                                                                                left: 0;
                                                                                        
                                                                                                height: 100%;
                                                                                                width: 100%;
                                                                                                object-fit: cover;
                                                                                            "
                                                                                        />
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            ';
                                                                        } elseif ($built_game_id !== null) {
                                                                            echo '
                                                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">

                                                                                    <img 
                                                                                        src=" " 
                                                                                        class="w-100"
                                                                                    />

                                                                                    <a href="#!">
                                                                                        <div class="hover-overlay">
                                                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                            ';
                                                                            
                                                                        } elseif ($added_component_id !== null) {
                                                                            echo '
                                                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">

                                                                                    <img 
                                                                                        src=" " 
                                                                                        class="w-100"
                                                                                    />

                                                                                    <a href="#!">
                                                                                        <div class="hover-overlay">
                                                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                            ';
                                                                            
                                                                        } else {
                                                                            echo 'Error';
                                                                        }



                                                                    

                                                                        

                                                                        echo '

                                                                        
                                                                

                                                                <div class="col-md-6 col-lg-6 col-xl-6">';

                                                                if ($published_game_id) {

                                                                    $sqlPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                                                                    $queryPublished = $conn->query($sqlPublished);
                                                                    while ($fetchedPublished = $queryPublished->fetch_assoc()) {
                                                                        $built_game_id = $fetchedPublished['built_game_id'];
                                                                        $game_name = $fetchedPublished['game_name'];

                                                                        echo '
                                                                                        <h5 class="card-title">' . $game_name . '</h5>
                                                                                    ';
                                                                    }
                                                                } elseif ($built_game_id) {

                                                                    $sqlBuilt = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
                                                                    $queryBuilt = $conn->query($sqlBuilt);
                                                                    while ($fetchedBuilt = $queryBuilt->fetch_assoc()) {
                                                                        $game_id = $fetchedBuilt['game_id'];
                                                                        $name = $fetchedBuilt['name'];

                                                                        echo '
                                                                                        <h5 class="card-title">' . $name . '</h5>
                                                                                    ';
                                                                    }
                                                                } elseif ($added_component_id) {

                                                                    $sqlGetComponentId = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
                                                                    $queryGetComponentId = $conn->query($sqlGetComponentId);
                                                                    while ($fetchedGetComponentId = $queryGetComponentId->fetch_assoc()) {
                                                                        $this_component_id = $fetchedGetComponentId['component_id'];

                                                                        $sqlComponentName = "SELECT * FROM game_components WHERE component_id = $this_component_id";
                                                                        $queryComponentName = $conn->query($sqlComponentName);
                                                                        while ($fetchedComponentName = $queryComponentName->fetch_assoc()) {
                                                                            $component_name = $fetchedComponentName['component_name'];

                                                                            echo '<h5>' . $component_name . '</h5>';
                                                                        }
                                                                    }
                                                                }


                                                                if ($published_game_id) {

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
                                
                                                                        // Now you have the count of each rating value
                                                                        $count5 = $ratingCounts['5'];
                                                                        $count4 = $ratingCounts['4'];
                                                                        $count3 = $ratingCounts['3'];
                                                                        $count2 = $ratingCounts['2'];
                                                                        $count1 = $ratingCounts['1'];

                                                                        $ratingSum = array_sum($ratingsArray);
                                                                        $ratingCount = count($ratingsArray);
                                                                        $averageRating = ($ratingCount > 0) ? ($ratingSum / $ratingCount) : 0;

                                                                        $fullStars = round($averageRating);

                                                                        if ($ratingCount !== 0){
                                                                            for ($i = 1; $i <= $fullStars; $i++) {
                                                                                echo '<i class="fa fa-star"></i>';
                                                                            }
                                                                        }                                                           


                                                                        echo '

                                                                        </div>

                                                                        <span>';

                                                                        if ($ratingCount == 0){
                                                                            echo 'No Ratings Yet';
                                                                        } else if ($ratingCount !== 0){
                                                                            echo $averageRating;
                                                                        }

                                                                        echo'
                                                                        </span>
                                                                    </div>

                                                                    ';
                                                                }

                                                                    echo '
                                                                    <div class="mt-1 mb-0 text-muted">';

                                                                    if ($published_game_id) {
                                                                        echo '
                                                                        <span>Category: '.$category.'</span>
                                                                        <span class="text-primary"> • </span>

                                                                        <span>Edition: '.$edition.'</span>
                                                                        
                                                                        ';
                                                                    } elseif ($built_game_id){

                                                                    } elseif ($added_component_id){

                                                                    }

                                                                        

                                                                    echo '
                                                                    </div>';

                                                                    if ($published_game_id) {
                                                                        echo '
                                                                        <p class="text-truncate mb-4 mb-md-0">
                                                                            '.$creator_id.'
                                                                        </p>
                                                                        ';

                                                                    } elseif ($built_game_id) {
                                                                        echo 'Built Game';
                                                                    } elseif ($added_component_id) {
                                                                        echo 'Game Component';
                                                                    } else {
                                                                        echo 'Error';
                                                                    }



                                                                echo '

                                                                </div>

                                                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">

                                                                    <div class="d-flex flex-row align-items-center mb-1">
                                                                        <h4 class="mb-1 me-1">$13.99</h4>

                                                                        <span class="text-danger">
                                                                            <s>$20.99</s>
                                                                        </span>
                                                                    </div>

                                                                    <h6 class="text-success">Free shipping</h6>
                                                                    <div class="d-flex flex-column mt-4">
                                                                        <button class="btn btn-primary btn-sm" type="button">Details</button>
                                                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                                            Add to wishlist
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                        ';
                                                    }

                                                    ?>



                                                    <!-- /laman -->

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




                        <!-- 
                        <div class="card shadow-0 border rounded-3">

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp" class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>Quant trident shirts</h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-danger mb-1 me-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>310</span>
                                        </div>

                                        <div class="mt-1 mb-0 text-muted small">
                                            <span>100% cotton</span>
                                            <span class="text-primary"> • </span>
                                            <span>Light weight</span>
                                            <span class="text-primary"> • </span>
                                            <span>Best finish<br /></span>
                                        </div>

                                        <div class="mb-2 text-muted small">
                                            <span>Unique design</span>
                                            <span class="text-primary"> • </span>
                                            <span>For men</span>
                                            <span class="text-primary"> • </span>
                                            <span>Casual<br /></span>
                                        </div>

                                        <p class="text-truncate mb-4 mb-md-0">
                                            There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable.
                                        </p>

                                    </div>

                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">

                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">$13.99</h4>

                                            <span class="text-danger">
                                                <s>$20.99</s>
                                            </span>
                                        </div>

                                        <h6 class="text-success">Free shipping</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <button class="btn btn-primary btn-sm" type="button">Details</button>
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Add to wishlist
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                         -->






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