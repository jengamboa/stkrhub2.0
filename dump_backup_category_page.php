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

    <link href="jquery-ui-1.10.2.custom.min.css" media="screen" rel="stylesheet" type="text/css">
    <script src="jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
    <script src="filter.js" type="text/javascript"></script>
    <script src="pagination.js?<?php echo time(); ?>" type="text/javascript"></script>

    <!-- CSS ============================     -->
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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php
        include 'css/body.css';
        ?>

        @import url(https://fonts.googleapis.com/css?family=Raleway);




        .content {
            position: relative;


        }

        .content-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s
        }

        .content:hover .content-overlay {
            opacity: 1
        }

        img {
            box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
            border-radius: 5px
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s
        }

        .content:hover .content-details {
            top: 50%;
            left: 50%;
            opacity: 1
        }

        .content-details h3 {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.15em;
            margin-bottom: 0.5em;
            text-transform: uppercase
        }

        .content-details p {
            color: #fff;
            font-size: 0.8em
        }

        .fadeIn-bottom {
            top: 70%
        }
    </style>

</head>

<body id="category">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">

                </div>

            </div>

            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>


                </div>
                <!-- End Filter Bar -->

                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">


                        <!-- single product -->
                        <div class="col-lg-4 col-md-7" style="border: 5px solid yellow; ">


                            <div class="single-product" style="border: 5px solid green;">

                                <div class="content">
                                    <div class="content-overlay" style="height: 132px; width: 100%;"></div>

                                    <img src="img/16x9.jpg" class="card-img-top" alt="..."
                                        style="height: 132px !important; width: 100%;">

                                    <div class="content-details fadeIn-bottom">
                                        <p class="card-subtitle mb-2 text-muted h6" style="font-size: 0.58rem;">
                                            <%= outline %>
                                        </p>

                                        <i class="fa-solid fa-clock"></i>
                                        <small>
                                            <%= runtime %> mins.
                                        </small>
                                    </div>

                                </div>

                                <div class="product-details">
                                    <div>
                                        <i class="fa fa-star text-primary"></i>

                                        <span class="rating-number">
                                            <%= rating %><span class="rating-count">(20)</span>
                                        </span>

                                        <h5 class="card-title">
                                            <%= name %>
                                        </h5>
                                    </div>

                                    <div>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <small>
                                                Creator ID: <%= director %>
                                            </small>
                                        </h6>

                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <small>
                                                <%= year %>
                                            </small>
                                        </h6>
                                    </div>



                                    <span class="lnr"
                                        style="color: #26d3e0; padding-left: 5px; padding-right: 5px; border-radius: 10%;">
                                        <i class="fa-solid fa-peso-sign">Price: <%= stars %></i>
                                    </span>

                                    <div class="prd-bottom">

                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>

                                        <a href="" class="social-info view">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">View</p>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </section>
                <!-- End Best Seller -->

            </div>
        </div>
    </div>




</body>

</html>