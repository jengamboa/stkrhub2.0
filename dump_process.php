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
    <?php include 'css/header.css'; ?><?php include 'css/body.css'; ?>.product_card {

      background-image: linear-gradient(to bottom, transparent 60%, #272a4e 100%);
      border-radius: 20px;
      display: flex;
      padding: 1.7px;
      transition: background-image 0.3s, transform 0.3s ease;
      cursor: pointer;
    }

    .product_card:hover {
      background-image: linear-gradient(to bottom, transparent 60%, #8e38ba 100%);
      transform: scale(1.03);
    }

    .product_card .card {
      background: linear-gradient(to top, #272a4e 0%, #272a4e 25%);
      border-radius: 20px;
      width: 100%;
    }

    .product_card .card:hover {
      background: linear-gradient(to top, #49265d 0%, #272a4e 20%);
    }
  </style>
</head>

<body>





  <div class="product_card" style="width: 20rem;">
    <div class="card" style="border: none;">

      <div class="container p-0" style="margin-bottom: 3rem;">
        <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 20px; position: relative; padding-top: 45.25%;">
          <img class="card-img-top image-mini" src="img/i2.jpg" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
        </div>
      </div>

      <div class="title-subtitle-container px-2 py-0" style="position: absolute; top: 0; right: 0; width: 100%;">
        <div class="single-product">
          <div class="product-details">
            <div class="prd-bottom">
              <a href="" class="social-info" data-toggle=>
                <span class="ti-bag"></span>
                <p class="hover-text text-capitalize" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9);">Add to Cart</p>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="title-subtitle-container px-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
        <div class="row" style="width: 100%;">
          <div class="col-1">
            <div class="p-0" style="position: relative; display: inline-block; width: 34px; height: 34px; border-radius: 50%; background-color: #333;">
              <img src="img/i2.jpg" style="
                position: absolute;
                top: 0;
                left: 0;

                height: 100%;
                width: 100%;
                object-fit: cover;
                border-radius: 50%;">
            </div>
          </div>
          <div class="col" style="margin-left: 30px;">
            <div class="row">
              <h5 class="d-inline-block text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="hahah">
                Praeterea iter est quasdam res quas ex communi.asdadaksjdkjaskdasdjkasldjalksdlalsdasdaslkdj
              </h5>
            </div>
            <div class="row">
              <h6 class="d-inline-block text-muted small text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="hahah">
                Category
              </h6>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

















  <div class="container mx-auto mt-4 justify-content-around" style="border: red solid 2px;">
    <div class="row d-flex justify-content-around">

      <div class="product_card m-2" style="width: 22rem;">
        <div class="card" style="border: none;">

          <div class="container p-0" style="margin-bottom: 3rem;">
            <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 20px; position: relative; padding-top: 45.25%;">
              <img class="card-img-top image-mini" src="img/i2.jpg" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
            </div>
          </div>

          <div class="title-subtitle-container px-2 py-0" style="position: absolute; top: 0; right: 0; width: 100%;">
            <div class="single-product">
              <div class="product-details">
                <div class="prd-bottom">
                  <a href="" class="social-info" data-toggle=>
                    <span class="ti-bag"></span>
                    <p class="hover-text text-capitalize" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9);">Add to Cart</p>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="title-subtitle-container px-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
            <div class="row" style="width: 100%;">
              <div class="col-1">
                <div class="p-0" style="position: relative; display: inline-block; width: 34px; height: 34px; border-radius: 50%; background-color: #333;">
                  <img src="img/i2.jpg" style="
                position: absolute;
                top: 0;
                left: 0;

                height: 100%;
                width: 100%;
                object-fit: cover;
                border-radius: 50%;">
                </div>
              </div>
              <div class="col" style="margin-left: 30px;">
                <div class="row">
                  <h5 class="d-inline-block text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="hahah">
                    Praeterea iter est quasdam res quas ex communi.asdadaksjdkjaskdasdjkasldjalksdlalsdasdaslkdj
                  </h5>
                </div>
                <div class="row">
                  <h6 class="d-inline-block text-muted text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="hahah">
                    Category
                  </h6>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      

      
    </div>
  </div>












  <script src="js/vendor/jquery-2.2.4.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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
</body>

</html>