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
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-myaccount-tab" data-toggle="pill" href="#v-pills-myaccount" role="tab" aria-controls="v-pills-myaccount" aria-selected="true">My Account</a>

                        <a class="nav-link" id="v-pills-mypurchase-tab" data-toggle="pill" href="#v-pills-mypurchase" role="tab" aria-controls="v-pills-mypurchase" aria-selected="false">My Purchase</a>

                        <a class="nav-link" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-logout" aria-selected="false">Logout</a>


                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-myaccount" role="tabpanel" aria-labelledby="v-pills-myaccount-tab">

                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                                    <a class="nav-item nav-link" id="nav-addresses-tab" data-toggle="tab" href="#nav-addresses" role="tab" aria-controls="nav-addresses" aria-selected="false">Addresses</a>
                                    <a class="nav-item nav-link" id="nav-changepassword-tab" data-toggle="tab" href="#nav-changepassword" role="tab" aria-controls="nav-changepassword" aria-selected="false">Change Password</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <section style="padding: 20px;">
                                        <div class="container">
                                            <h3 class="text-heading">Text Sample</h3>
                                            <p class="sample-text">
                                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short
                                                film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene,
                                                or video renters with their big project. But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how
                                                do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title
                                                inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes
                                                and polywrap sitting on your doorstep? You need to create eye-popping artwork and have your project replicated.
                                                Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a
                                                helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy
                                                steps to follow for good DVD replication results: <br>asdasd<br>asdasd<br>asdasd<br>asdasd

                                            </p>
                                        </div>
                                    </section>
                                </div>

                                <div class="tab-pane fade" id="nav-addresses" role="tabpanel" aria-labelledby="nav-addresses-tab">
                                    <section style="padding: 20px;">
                                        <div class="container">
                                            <h3 class="text-heading">Text Sample</h3>
                                            <p class="sample-text">
                                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short
                                                film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene,
                                                or video renters with their big project. But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how
                                                do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title
                                                inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes
                                                and polywrap sitting on your doorstep? You need to create eye-popping artwork and have your project replicated.
                                                Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a
                                                helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy
                                                steps to follow for good DVD replication results:

                                            </p>
                                        </div>
                                    </section>
                                </div>

                                <div class="tab-pane fade" id="nav-changepassword" role="tabpanel" aria-labelledby="nav-changepassword-tab">
                                    <section style="padding: 20px;">
                                        <div class="container">
                                            <h3 class="text-heading">Text Sample</h3>
                                            <p class="sample-text">
                                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short
                                                film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene,
                                                or video renters with their big project. But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how
                                                do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title
                                                inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes
                                                and polywrap sitting on your doorstep? You need to create eye-popping artwork and have your project replicated.
                                                Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a
                                                helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy
                                                steps to follow for good DVD replication results:

                                            </p>
                                        </div>
                                    </section>
                                </div>

                            </div>
                            <!-- /laman -->

                        </div>

                        <div class="tab-pane fade" id="v-pills-mypurchase" role="tabpanel" aria-labelledby="v-pills-mypurchase-tab">
                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All</a>
                                    <a class="nav-item nav-link" id="nav-topay-tab" data-toggle="tab" href="#nav-topay" role="tab" aria-controls="nav-topay" aria-selected="false">To Pay</a>
                                    <a class="nav-item nav-link" id="nav-toship-tab" data-toggle="tab" href="#nav-toship" role="tab" aria-controls="nav-toship" aria-selected="false">To Ship</a>
                                    <a class="nav-item nav-link" id="nav-toreceive-tab" data-toggle="tab" href="#nav-toreceive" role="tab" aria-controls="nav-toreceive" aria-selected="false">To Receive</a>
                                    <a class="nav-item nav-link" id="nav-completed-tab" data-toggle="tab" href="#nav-completed" role="tab" aria-controls="nav-completed" aria-selected="false">Completed</a>
                                    <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                                    <section style="padding: 20px;">
                                        <div class="container">
                                            <h3 class="text-heading">All</h3>
                                            <p class="sample-text">
                                                Every avid independent filmmaker has <b>Bold</b> about making that <i>Italic</i> interest documentary, or short
                                                film to show off their creative prowess. Many have great ideas and want to “wow” the<sup>Superscript</sup> scene,
                                                or video renters with their big project. But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how
                                                do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title
                                                inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs, with UPC barcodes
                                                and polywrap sitting on your doorstep? You need to create eye-popping artwork and have your project replicated.
                                                Using a reputable full service DVD Replication company like PacificDisc, Inc. to partner with is certainly a
                                                helpful option to ensure a professional end result, but to help with your DVD replication project, here are 4 easy
                                                steps to follow for good DVD replication results:

                                            </p>
                                        </div>
                                    </section>
                                </div>
                                <div class="tab-pane fade" id="nav-topay" role="tabpanel" aria-labelledby="nav-topay-tab">To Pay</div>
                                <div class="tab-pane fade" id="nav-toship" role="tabpanel" aria-labelledby="nav-toship-tab">To Ship</div>
                                <div class="tab-pane fade" id="nav-toreceive" role="tabpanel" aria-labelledby="nav-toreceive-tab">To Receive</div>
                                <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-complete-tab">Completed</div>
                                <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">Cancelled</div>
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


    <script>
        $(document).ready(function() {
            // Retrieve the last active tab for the main navigation
            var lastActiveTabMain = sessionStorage.getItem('lastActiveTabMain');
            if (lastActiveTabMain) {
                $('.nav-pills a[href="' + lastActiveTabMain + '"]').tab('show');
            }

            // Retrieve the last active tab for the nested tabs
            var lastActiveTabNested = sessionStorage.getItem('lastActiveTabNested');
            if (lastActiveTabNested) {
                $('.nav-tabs a[href="' + lastActiveTabNested + '"]').tab('show');
            }

            // Store the active tab for the main navigation when a tab is clicked
            $('.nav-pills a').on('shown.bs.tab', function(e) {
                var target = e.target.getAttribute('href');
                sessionStorage.setItem('lastActiveTabMain', target);
            });

            // Store the active tab for the nested tabs when a tab is clicked
            $('.nav-tabs a').on('shown.bs.tab', function(e) {
                var target = e.target.getAttribute('href');
                sessionStorage.setItem('lastActiveTabNested', target);
            });
        });
    </script>


</body>

</html>