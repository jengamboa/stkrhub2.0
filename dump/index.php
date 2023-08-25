<!DOCTYPE html>
<html>

<head>
  <title>Simple Form with Dropzone</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
</head>

<body>
  <h2>Simple Form with Dropzone</h2>

  <form id="my-form" action="process_main.php" method="post" enctype="multipart/form-data">

    <!-- Name Input -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <!-- Dropzone.js File Upload -->
    <div id="file-upload" class="dropzone">
      <input type="hidden" name="user_id" value="123">
      <input type="hidden" name="built_game_id" value="456">
    </div><br><br>

    <button type="submit" id="submit-button">Submit</button>
  </form>


  <!-- Include Dropzone.js script -->
  <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"></script>
  <!-- Initialize Dropzone -->
  <script>
    var myDropzone = new Dropzone("#file-upload", {
      paramName: "file", // Name of the uploaded file parameter
      url: "process_dropzone.php", // URL to handle file uploads
      autoProcessQueue: false, // Don't process files automatically
      addRemoveLinks: true,
      parallelUploads: 10,
    });

    // Prevent the default form submission and start Dropzone file processing
    document.getElementById("submit-button").addEventListener("click", function (e) {
      e.preventDefault(); // Prevent the default form submission
      myDropzone.processQueue(); // Process the file queue
    });

    // When all files are uploaded, submit the form to process_main.php
    myDropzone.on("queuecomplete", function () {
      document.getElementById("my-form").submit();
    });
  </script>
</body>

</html>