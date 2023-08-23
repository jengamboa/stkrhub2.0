<?php
//index.php
include 'connection.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>How to Upload a File using Dropzone.js with PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
</head>

<body>

    <form action="upload.php" class="dropzone" id="dropzoneFrom">
        <div class="form-group">
            <label for="gameName">Game Name:</label>
            <input type="text" class="form-control" id="gameName" name="gameName" required>
        </div>
    </form>

    <button type="button" class="btn btn-info" id="submit-all">Upload</button>

</body>

</html>

<script>

    $(document).ready(function () {

        Dropzone.options.dropzoneFrom = {
            maxFilesize: 1000,
            addRemoveLinks: true,

            autoProcessQueue: false,
            parallelUploads: 10,
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            init: function () {
                var submitButton = document.querySelector('#submit-all');
                myDropzone = this;
                submitButton.addEventListener("click", function () {
                    myDropzone.processQueue();
                });

            },
        };

    });
</script>