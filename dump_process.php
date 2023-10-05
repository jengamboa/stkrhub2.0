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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    <?php include 'css/header.css'; ?>
    <?php include 'css/body.css'; ?>
    #infoTable tbody tr {
      background-color: transparent !important;
    }

    .image-mini-container {
      overflow: hidden;
      width: 100%;
      position: relative;
      padding-top: 70%;
    }

    .image-mini {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      object-fit: cover;
      -webkit-mask-image: linear-gradient(to left, transparent 0%, black 100%);
      mask-image: linear-gradient(to bottom, transparent 0%, black 100%);
    }

    .custom-shadow {
      box-shadow: 0 0 10px #000000;
    }
  </style>
</head>

<body>

  <div class="col-0 d-flex align-items-center">
    <input type="checkbox" style="transform: scale(1.5); margin-right: 10px;">
  </div>



  <div class="row">

    <div class="col">

      <div class="card rounded-3 mb-4 p-0 custom-shadow" style="background-color: #171717; padding: 0.1rem;">

        <div class="card-header py-1">
          <div class="row p-0">



            <div class="col-0 d-flex align-items-center">
              Classification
            </div>

            <div class="col-0 d-flex align-items-center ml-auto">
              <div class="mr-2">order id</div>
              <div class="mr-2">status</div>
            </div>

          </div>

        </div>

        <div class="card-body p-0" style="background-color: #272a4e;">
          <div class="row d-flex justify-content-between align-items-center ">

            <div class="col-md-2 col-lg-2 col-xl-2 p-0">
              <div class="container" style="height: 100%; width: 100%;">
                <div class="image-mini-container mask1">
                  <img class="image-mini" src="img/i2.jpg">
                </div>
              </div>
            </div>


            <div class="col-4">
              <p class="lead fw-normal mb-2 text-truncate" data-toggle="Title" title="Disabled tooltip"
                style="max-width: 100%;">Title Lorem ipsum dolor siasdasdertrdtt amet co Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Adipisci consequuntur ipsa quis modi tempora eum id qui maiores iure
                dolorem quia veritatis, doloribus, quas animi. Porro vitae voluptate officiis quos?</p>
              <p>
                <span class="text-muted">Size: </span>M
                <span class="text-muted">Color: </span>Grey
              </p>
            </div>

            <div class="col">
              <h5 class="mb-0">$499.00</h5>
            </div>

            <div class="col">
              <input min="0" max="99" value="1" type="number" class="form-control form-control-sm col-5" />
            </div>

            <div class="col">
              <h5 class="mb-0">$499.00</h5>
            </div>

            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
              <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
            </div>

          </div>
        </div>

      </div>

    </div>

  </div>


  <div class="container">
    <div class="row">

      <div class="col-0 d-flex align-items-center">
        <input type="checkbox" style="transform: scale(1.5); margin-right: 10px;">
      </div>

      <div class="col">

        <div class="card rounded-3 mb-4 p-0 custom-shadow" style="background-color: #171717; padding: 0.1rem;">

          <div class="card-header py-1">
            <div class="row p-0">



              <div class="col-0 d-flex align-items-center">
                Classification
              </div>

              <div class="col-0 d-flex align-items-center ml-auto">
                <div class="mr-2">order id</div>
                <div class="mr-2">status</div>
              </div>

            </div>

          </div>

          <div class="card-body p-0" style="background-color: #272a4e;">
            <div class="row d-flex justify-content-between align-items-center ">

              <div class="col-md-2 col-lg-2 col-xl-2 p-0">
                <div class="container" style="height: 100%; width: 100%;">
                  <div class="image-mini-container mask1">
                    <img class="image-mini" src="img/i2.jpg">
                  </div>
                </div>
              </div>


              <div class="col-3 overflow-hidden">
                <p class="lead fw-normal mb-2 text-truncate" data-toggle="tooltip" title="Title">
                  Title
                </p>

                <p>
                  <span class="text-muted">Size: </span>M
                  <span class="text-muted">Color: </span>Grey
                </p>
              </div>

              <div class="col">
                <h5 class="mb-0">$499.00</h5>
              </div>

              <div class="col-2">
                <input min="0" max="99" value="1" type="number" class="form-control form-control-sm col-5" />
              </div>

              <div class="col">
                <h5 class="mb-0">$499.00</h5>
              </div>

              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>

            </div>
          </div>

        </div>

      </div>


    </div>

    
  </div>

  <script src="js/vendor/jquery-2.2.4.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
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