<?php
session_start();

include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

$user_id = $_SESSION['user_id'];

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
    <title>Create Game</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Bootstrap 5.1 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style>
        <?php // include 'css/body.css'; 
        ?>
    </style>
</head>

<body>
    <?php
    include 'connection.php';


    $header_home = 'active';
    include 'html/page_header.php';

    ?>

    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1></h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Element</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>



    <div class="section-top-border" style="padding-top: 1cm;">
    <div class="row">
        <div class="col-lg-8 col-md-8" style="margin: 0 auto; border: 1px solid #000; padding: 2cm;">
            <h3 class="mb-30" style="color: black;">Create Game</h3>
            <form method="post" action="process_create_game.php">
                <div class="mt-10">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Game Name..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Game Name...'" required class="single-input" style="box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3);">
                </div>
                <br>
                <div class="mt-10">
                    <label for="description">Description:</label>
                    <textarea class="single-textarea" id="description" placeholder="Description..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description...'" required style="box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.3);"></textarea>
                </div>
                <br>
                <input type="submit" class="genric-btn primary circle" value="Create Game">
            </form>
        </div>
    </div>
</div>






    <!-- End Align Area -->


    <!-- start footer Area -->
    <?php //include 'html/page_footer.php'; 
    ?>
    <!-- End footer Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>