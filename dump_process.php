<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slick.js Carousel Example</title>
    
    <!-- Include jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Slick.js and Slick CSS CDNs -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <style>
        /* Add your custom CSS styles here */
        .slick-slide {
            text-align: center;
            background: #f8f8f8;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="carousel-container">
    <div class="carousel">
        <div><img src="https://placeimg.com/400/200/nature" alt="Image 1"></div>
        <div><img src="https://placeimg.com/400/200/animals" alt="Image 2"></div>
        <div><img src="https://placeimg.com/400/200/architecture" alt="Image 3"></div>
        <div><img src="https://placeimg.com/400/200/food" alt="Image 4"></div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.carousel').slick({
            autoplay: true,
            autoplaySpeed: 2000, // Slide duration in milliseconds
            dots: true, // Show navigation dots
        });

        $('.carousel').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.carousel').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
    });
</script>

</body>
</html>
