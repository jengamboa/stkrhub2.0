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


    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css?<?php echo time(); ?>" />




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

    <!-- Demo styles -->
    <style>
        <?php
        include 'css/body.css';
        ?>.mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .image-carousel-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-carousel {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .image-slide-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-slide {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php

    include 'connection.php';
    if (isset($_GET['id'])) {
        $published_game_id = $_GET['id'];
    }
    $sql = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
    $query = $conn->query($sql);
    while ($fetched = $query->fetch_assoc()) {
        $published_game_id = $fetched['published_game_id'];
        $game_name = $fetched['game_name'];
        $category = $fetched['category'];
        $edition = $fetched['edition'];
        $published_date = $fetched['published_date'];
        $creator_id = $fetched['creator_id'];
        $age_id = $fetched['age_id'];
        $short_description = $fetched['short_description'];
        $long_description = $fetched['long_description'];
        $website = $fetched['website'];
        $logo_path = $fetched['logo_path'];
        $min_players = $fetched['min_players'];
        $max_players = $fetched['max_players'];
        $min_playtime = $fetched['min_playtime'];
        $max_playtime = $fetched['max_playtime'];
        $marketplace_price = $fetched['marketplace_price'];
    }


    ?>


    <!-- Start Banner Area -->
    <!-- <section class="banner-area organic-breadcrumb">

    </section> -->
    <!-- End Banner Area -->


    <form method="post" action="process_add_published_game_page_to_cart.php">
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">

                    <div class="col-lg-9" style="margin-right: 20px;">
                        <div class="s_Product_carousel">


                            <div class="swiper-container">

                                <div class="swiper mySwiper2" style="margin-bottom: 10px;">
                                    <div class="swiper-wrapper">

                                        <?php
                                        $sqlBig = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
                                        $resultBig = $conn->query($sqlBig);

                                        while ($fetchedBig = $resultBig->fetch_assoc()) {
                                            $published_file_id = $fetchedBig['published_file_id'];
                                            $file_path = $fetchedBig['file_path'];

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                            $file_extension = strtolower($extension);

                                            // Check if the file extension is "mp4"
                                            if ($file_extension === "mp4") {
                                                echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-carousel-container">
                                                            <video class="image-carousel" controls>
                                                                <source src="' . $file_path . '" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    </div>
                                                ';
                                            } else {
                                                echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-carousel-container">
                                                            <img class="image-carousel" src="' . $file_path . '" />
                                                        </div>
                                                    </div>
                                                ';
                                            }
                                        }
                                        ?>

                                    </div>

                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>

                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">

                                        <?php
                                        $sqlSmall = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
                                        $resultSmall = $conn->query($sqlSmall);

                                        while ($fetchedSmall = $resultSmall->fetch_assoc()) {
                                            $published_file_id = $fetchedSmall['published_file_id'];
                                            $file_path = $fetchedSmall['file_path'];

                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                            $file_extension = strtolower($extension);

                                            // Check if the file extension is "mp4"
                                            if ($file_extension === "mp4") {
                                                echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-slide-container">
                                                            <video class="image-slide">
                                                                <source src="' . $file_path . '">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    </div>
                                                ';
                                            } else {
                                                echo '
                                                    <div class="swiper-slide">
                                                        <div class="image-slide-container">
                                                            <img class="image-slide" src="' . $file_path . '" />
                                                        </div>
                                                    </div>
    
                                                ';
                                            }
                                        }
                                        ?>

                                        <!-- duplicate -->
                                        <!-- <div class="swiper-slide">
                                            <div class="image-slide-container">
                                                <video class="image-slide">
                                                    <source src="img/stock_video.mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div> -->

                                        <!-- <div class="swiper-slide">
                                            <div class="image-slide-container">
                                                <img class="image-slide" src="img/16x9.jpg" />
                                            </div>
                                        </div> -->

                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                    <div class="col-lg offset-lg">
                        <div class="s_product_text">
                            <h3>
                                <?php echo $game_name; ?>
                            </h3>

                            <h2>
                                &#8369 <?php echo $marketplace_price; ?>
                            </h2>
                            <ul class="list">
                                <li><a class="active" href="#"><span>Category</span> : <?php echo $category; ?> </a></li>
                                <!-- <li><a href="#"><span>Availibility</span> : In Stock</a></li> -->
                            </ul>



                            <div class="product_count">
                                <label for="qty">Quantity:</label>
                                <input type="number" name="quantity" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">

                                <input type="hidden" name="published_game_id" value="<?php echo $published_game_id; ?>"><br>
                                <input type="hidden" name="marketplace_price" value="<?php echo $marketplace_price; ?>"><br>
                            </div>

                            <input type="hidden" name="" id="">

                            <div class="card_area d-flex align-items-center">

                                <button class="primary-btn" type="submit">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
    </form>



    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <strong>Short Description:</strong>
                    <p>
                        <?php echo $short_description; ?>
                    </p>

                    <strong>Long Description:</strong>
                    <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we
                        are seeing
                        more and more recipe books and Internet websites that are dedicated to the act of cooking for
                        one. Divorce and
                        the death of spouses or grown children leaving for college are all reasons that someone
                        accustomed to cooking for
                        more than one would suddenly need to learn how to adjust all the cooking practices utilized
                        before into a
                        streamlined plan of cooking that is more efficient for one person creating less</p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Width</h5>
                                    </td>
                                    <td>
                                        <h5>128mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Height</h5>
                                    </td>
                                    <td>
                                        <h5>508mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Depth</h5>
                                    </td>
                                    <td>
                                        <h5>85mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Weight</h5>
                                    </td>
                                    <td>
                                        <h5>52gm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Quality checking</h5>
                                    </td>
                                    <td>
                                        <h5>yes</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Freshness Duration</h5>
                                    </td>
                                    <td>
                                        <h5>03days</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>When packeting</h5>
                                    </td>
                                    <td>
                                        <h5>Without touch of hand</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Each Box contains</h5>
                                    </td>
                                    <td>
                                        <h5>60pcs</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="comment_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item reply">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-2.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-3.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Post a comment</h4>
                                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on 3 Reviews</h3>
                                        <ul class="list">
                                            <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-2.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-3.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <p>Your Rating:</p>
                                <ul class="list">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <p>Outstanding</p>
                                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="primary-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->







    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js?<?php echo time(); ?>"></script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>

</html>