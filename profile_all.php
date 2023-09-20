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

                                            <!-- START -->

                                            <div id="test-list">
                                                <input type="text" class="search" />
                                                <ul class="list">
                                                    <li>
                                                        <p class="name">Guybrush Threepwood</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Elaine Marley</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">LeChuck</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Stan</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Voodoo Lady</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Herman Toothrot</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Meathook</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Carla</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Otis</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Rapp Scallion</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Rum Rogers Sr.</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Men of Low Moral Fiber</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Murray</p>
                                                    </li>
                                                    <li>
                                                        <p class="name">Cannibals</p>
                                                    </li>
                                                </ul>
                                                <ul class="pagination"></ul>
                                            </div>




                                            <div class="card shadow-0 border rounded-3">
                                                <div class="card-header p-0 py-1">
                                                    <ul class="nav">
                                                        <li class="nav-link">
                                                            CLASSIFICATION
                                                        </li>
                                                        <li class="nav-item ml-auto">
                                                        <li class="nav-item">
                                                            <a class="nav-link">ORDER ID</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link">STATUS</a>
                                                        </li>
                                                        </li>
                                                    </ul>
                                                </div>


                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(4).webp" class="w-100" />
                                                                <a href="#!">
                                                                    <div class="hover-overlay">
                                                                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                                            <h5>Quant olap shirts</h5>
                                                            <div class="d-flex flex-row">
                                                                <div class="text-danger mb-1 me-2">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <span>289</span>
                                                            </div>
                                                            <div class="mt-1 mb-0 text-muted">
                                                                <span>Game Category</span>
                                                                <span class="text-primary"> • </span>
                                                                <span>Edition</span>
                                                                <span class="text-primary"> • </span>
                                                                <span>Price<br /></span>
                                                            </div>
                                                            <div class="mb-2 text-muted small">
                                                                <span>Creator</span>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                            <h6 class="text-primary">Order Total: </h6>
                                                            <div class="d-flex flex-row align-items-center mb-1">
                                                                <h4 class="mb-1 me-1">$14.99</h4>
                                                            </div>

                                                            <div class="d-flex flex-column mt-4">
                                                                <button class="btn btn-primary btn-sm" type="button">Details</button>
                                                                <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                                    Add to wishlist
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="card-footer py-1">
                                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fas fa-chevron-down"></i> Show Added Game Components
                                                    </a>

                                                    <div class="collapse" id="collapseExample">
                                                        <div class="card card-body">

                                                            This content can be collapsed and expanded.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>












                                            <!-- END -->




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

    



</body>

</html>