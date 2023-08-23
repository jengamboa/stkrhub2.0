<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <!-- Include Dropzone.js CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.css">
</head>
<body>
    <h1>Upload Files</h1>
    <form action="upload.php" class="dropzone" id="myDropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
    
    <!-- Explicit upload button -->
    <button id="uploadButton" class="btn">Upload</button>

    <!-- Include Dropzone.js -->
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script>
    <script>
        // Attach a click event listener to the explicit upload button
        document.getElementById('uploadButton').addEventListener('click', function () {
            // Trigger Dropzone's processQueue method to initiate the upload
            if (Dropzone.instances.length > 0) {
                Dropzone.instances[0].processQueue();
            }
        });
    </script>
</body>
</html>
