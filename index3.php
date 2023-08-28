<!DOCTYPE html>
<html>

<head>
  <title>My Now Amazing Webpage</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

  <link href="https://unpkg.com/filepond@4.27.0/dist/filepond.min.css" rel="stylesheet">
  <!-- Add FilePond image preview plugin stylesheet -->
  <link href="https://unpkg.com/filepond-plugin-image-preview@4.0.3/dist/filepond-plugin-image-preview.css"
    rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .your-class {
      width: 80%;
      margin: 0 auto;
    }

    .slide {
      background-color: #f0f0f0;
      padding: 20px;
      text-align: center;
      border-radius: 5px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    .slide input {
      display: block;
      margin: 10px auto;
    }

    .slick-prev,
    .slick-next {
      font-size: 18px;
    }

    .slick-dots {
      bottom: -30px;
    }
  </style>
</head>

<body>

  <form id="uploadForm" action="dump_process.php" method="post" enctype="multipart/form-data">

    <div class="your-class">
      <div class="slide">
        <input type="file" class="filepond slide-file-input" name="slideFiles[]" />
        <div>Your content 1</div>
      </div>
      <div class="slide">
        <input type="file" class="filepond slide-file-input" name="slideFiles[]" />
        <div>Your content 2</div>
      </div>
      <div class="slide">
        <input type="file" class="filepond slide-file-input" name="slideFiles[]" />

        <div>Your content 3</div>
      </div>
    </div>

    <button id="addSlide">Add Slide</button>
    <button id="removeSlide">Remove Slide</button>

    <button type="submit" id="submitForm">Submit</button>
  </form>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://unpkg.com/filepond@4.27.0/dist/filepond.min.js"></script>
  <!-- Add FilePond image preview plugin script -->
  <script src="https://unpkg.com/filepond-plugin-image-preview@4.0.3/dist/filepond-plugin-image-preview.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      
      // Register the plugin
      FilePond.registerPlugin(FilePondPluginImagePreview);
      var $slider = $('.your-class');

      // Initialize Slick Carousel
      $slider.slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000
      });

      // Initialize FilePond for each individual input element
      const inputElements = document.querySelectorAll('input[type="file"].slide-file-input');
      inputElements.forEach(inputElement => {
        FilePond.create(inputElement, {
          allowMultiple: false,
          allowReplace: true,
          allowRemove: true,
          allowBrowse: true,
          storeAsFile: true
        });


      });

      // Add a slide
      $('#addSlide').click(function () {
        var slideCount = $slider.slick('getSlick').slideCount;
        if (slideCount < 10) {
          var newSlide = '<div class="slide" id="slide"><input type="file" class="slide-file-input" id="slide-file-input" name="slideFiles[]"/><div>New Slide</div></div>';
          $slider.slick('slickAdd', newSlide);

          // Initialize FilePond for the new input element
          const newInputElement = $slider.find('#slide').last().find('#slide-file-input')[0];
          FilePond.create(newInputElement, {
            allowMultiple: false,
            allowReplace: true,
            allowRemove: true,
            allowBrowse: true,
            storeAsFile: true
          });
          // Scroll to the newly added slide
          $slider.slick('slickGoTo', slideCount);
        }
      });

      $('#removeSlide').click(function () {
        var currentSlideIndex = $slider.slick('slickCurrentSlide'); // Get the index of the current slide
        if (currentSlideIndex >= 3) {
          $slider.slick('slickRemove', currentSlideIndex); // Remove the current slide
        }
      });

      
      
    });

  </script>

</body>

</html>