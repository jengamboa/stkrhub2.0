<?php
session_start();
include 'connection.php';

$component_id;

if (isset($_GET['id'])) {

    $component_id = $_GET['id'];
}

$component_sql = "SELECT * from game_components WHERE component_id = $component_id";
$component_query = $conn->query($component_sql);
$component_row = $component_query->fetch_assoc();

$color_sql = "SELECT * From component_colors WHERE component_id = $component_id";
$color_query = $conn->query($color_sql);

$template_sql = "SELECT * From component_templates WHERE component_id = $component_id";
$template_query = $conn->query($template_sql);

$thumbnail_sql = "SELECT * From component_assets WHERE component_id = $component_id";
$thumbnail_query = $conn->query($thumbnail_sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="">


</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';



        ?>

        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit Game Piece</h4>
                            <p class="mb-0">Fill the Details</p>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <div class="container my-5">
                            <form method="post" id="myForm" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $component_id; ?>"> </input>
                                <input type="hidden" name="category" value="<?php echo $component_row['category']; ?>"> </input>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="name"> Component Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $component_row['component_name']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"> Desccription:</label>
                                    <div class="col-sm-6">
                                        <textarea name="description" rows="4" cols="50"><?php echo $component_row['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"> Price:</label>
                                    <div class="col-sm-6">
                                        <input type="number" id="price" name="price" min="0" value="<?php echo $component_row['price']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"> Size:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="size" value="<?php echo $component_row['size']; ?>">
                                    </div>
                                </div>

                                <!-- Start of edit color -->
                                <?php
                                if ($component_row['has_colors'] == 1) {

                                    echo ' <p style="text-align:center;"> Colors Of This Component: </p>';

                                    while ($color_row = $color_query->fetch_assoc()) {
                                        echo '
                                        <input type="hidden" name="color_id[]" value="' . $color_row['color_id'] . '">
                                        <input type="hidden" name="has_colors" value="' . $component_row['has_colors'] . '"> </input>
                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Color Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="color_name[]" value="' . $color_row['color_name'] . '">
                                            </div>
                                        </div>
                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Color Code:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="color_code[]" value="' . $color_row['color_code'] . '">
                                            </div>
                                        </div>
                                        <div class="row mb-3 color-row">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <a class="btn btn-danger delete_color" data-color-id="' . $color_row['color_id'] . '" role="button">Delete</a>
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo '<div class="row mb-3">
                                        <input type="hidden" name="has_colors" value="' . $component_row['has_colors'] . '"> </input>
                                            <label class="col-sm-3 col-form-label">Component Has No Colors</label>
                                        </div>';
                                }
                                ?>

                                <div class="row mb-3">
                                    <div class="offset-sm-3 col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" id="Add_color" style="display: block;" role="button"> Add Color </a>
                                    </div>
                                </div>

                                <div class="offset-sm-3 col-sm-3 d-grid">
                                    <div id="colorInput" style="display: none;">
                                        <label for="color_number">No. of Colors</label>
                                        <input type="number" id="color_number" name="color_number" min="0" placeholder="0"><br><br>
                                    </div>

                                    <div id="colorFields" style="display: none;"> </div>

                                </div>

                                <div class="offset-sm-3 col-sm-3 d-grid">
                                    <a class="btn btn-danger" id="cancel_color" style="display: none;" role="button"> Cancel </a>
                                </div> <br>

                                <!-- End of edit color -->

                                <!-- Start of edit template -->


                                <p style="text-align:center;"> Templates Of This Component: </p>



                                <?php

                                while ($template_row = $template_query->fetch_assoc()) {
                                    echo '
                                        <input type="hidden" name="template_id[]" value="' . $template_row['template_id'] . '">
                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Template Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="template_name[]" value="' . $template_row['template_name'] . '">
                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Template Link:</label>
                                            <div class="col-sm-6">
                                            <a href="' . $template_row['template_file_path'] . '" download style = "color:blue;"> ' . $template_row['template_name'] . '</a>
                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Update Template File</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" name="template_file[]" accept = "image/*" id="template_file_' . $template_row['template_id'] . '">
                                                <a href="#" class="remove-thumbnail" data-template-id="' . $template_row['template_id'] . '" style = "color:red;">Remove</a>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3 color-row">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <a class="btn btn-danger delete_template" data-template-id="' . $template_row['template_id'] . '" role="button">Delete</a>
                                            </div>
                                        </div>';
                                }
                                ?>

                                <div class="row mb-3">
                                    <div class="offset-sm-3 col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" id="Add_template" style="display: block;" role="button"> Add Template </a>
                                    </div>
                                </div>

                                <div class="offset-sm-3 col-sm-3 d-grid">
                                    <div id="templateInput" style="display: none;">
                                        <label for="No_template"> No. Template</label><br>
                                        <input type="number" id="No_template" name="No_template" min="0" placeholder="0"><br><br>
                                    </div>

                                    <div id="TemplateFields" style="display: block;"> </div>

                                </div>

                                <div class="offset-sm-3 col-sm-3 d-grid">
                                    <a class="btn btn-danger" id="cancel_template" style="display: none;" role="button"> Cancel </a>
                                </div> <br>

                                <!-- End of edit template -->

                                <!-- Start of edit thumbnail -->


                                <p style="text-align:center;"> Thumbnail Of This Component: </p>

                                <?php

                                foreach ($thumbnail_query as $index => $thumbnail_row) {
                                    echo '
                                        <input type="hidden" name="thumbnail_id[]" value="' . $thumbnail_row['asset_id'] . '">

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Thumbnail Link:</label>
                                            <div class="col-sm-6">
                                                <a href="' . $thumbnail_row['asset_path'] . '" download style = "color:blue;"> Thumbnail ' . $index . ' </a>
                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> Update Thumbnail File</label>
                                            <div class="col-sm-6">
                                            <input type="file" class="form-control" name="thumbnail_file[]" accept="image/*" id="thumbnail_file_' . $thumbnail_row['asset_id'] . '">
                                            <a href="#" class="remove-thumbnail" data-thumbnail-id="' . $thumbnail_row['asset_id'] . '" style = "color:red;">Remove</a>

                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <a class="btn btn-danger delete_thumbnail" data-thumbnail-id="' . $thumbnail_row['asset_id'] . '" role="button">Delete</a>
                                            </div>
                                        </div>';
                                }

                                ?>

                                <div class="row mb-3">
                                    <div class="offset-sm-3 col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" id="Add_thumbnail" style="display: block;" role="button"> Add Thumbnail </a>
                                    </div>
                                </div>

                                <div class="offset-sm-3 col-sm-3 d-grid">
                                    <div id="thumbnailInput" style="display: none;">
                                        <label for="No_thumbnail">No. Thumbnail</label><br>
                                        <input type="number" id="No_thumbnail" name="No_thumbnail" min="0" placeholder="0"><br><br>
                                    </div>

                                    <div id="thumbnailFields" style="display: block;"> </div>

                                </div>

                                <div class="offset-sm-3 col-sm-3 d-grid">
                                    <a class="btn btn-danger" id="cancel_thumbnail" style="display: none;" role="button"> Cancel </a>
                                </div> <br>

                                <!-- End of edit thumbnail -->

                                <br><br><br>
                                <div class="row mb-3">
                                    <div class="offset-sm-3 col-sm-3 d-grid">
                                        <button type="submit" class="btn btn-primary"> Submit </button>
                                    </div>
                                    <div class=" col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" href="add_game_piece.php?category=<?php echo $component_row['category']; ?>" role="button">Cancel</a>
                                    </div>
                                </div>




                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>





        <div class="footer">






            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>



    </div>











    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {
            // JavaScript
            $(document).ready(function() {
                $(".remove-thumbnail").click(function(e) {
                    e.preventDefault();
                    var templateId = $(this).data('template-id');
                    var fileInput = $("#template_file_" + templateId);

                    // Clear the file input field
                    fileInput.val('');
                });
            });


            $(".remove-thumbnail").click(function(e) {
                e.preventDefault();
                var thumbnailId = $(this).data('thumbnail-id');
                var fileInput = $("#thumbnail_file_" + thumbnailId);

                // Clear the file input field
                fileInput.val('');
            });

            $("#myForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                // Send an AJAX POST request
                $.ajax({
                    type: "POST",
                    url: "admin_process_edit_gamepiece.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data inserted successfully!',
                        }).then(function() {
                            // Redirect to add_game_piece.php with the category parameter
                            var category = "<?php echo $component_row['category']; ?>";
                            window.location.href = "add_game_piece.php?category=" + category;
                        });

                        $('#gamePieceTable').DataTable().ajax.reload();
                        $("#myForm")[0].reset();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error in submitting data: ' + error.responseText,
                        });
                    }
                });

            });

            // delete colors


            const component_id = <?php echo $component_id; ?>;

            $(".delete_color").click(function() {
                var colorId = $(this).data('color-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: "Delete Color",
                    text: "Are you sure you want to delete this color?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed the deletion, proceed with AJAX request
                        $.ajax({
                            type: "POST",
                            url: "admin_delete_colors.php",
                            data: {
                                colorId: colorId,
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Color deleted successfully!',
                                });

                                // Reload the page
                                location.reload();
                            },
                            error: function(error) {
                                // Handle errors
                                console.error("Error deleting color: " + error);
                            }
                        });
                    }
                });
            });

            // delete template

            $(".delete_template").click(function() {
                var templateId = $(this).data('template-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: "Delete Template",
                    text: "Are you sure you want to delete this Template?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed the deletion, proceed with AJAX request
                        $.ajax({
                            type: "POST",
                            url: "admin_delete_template.php",
                            data: {
                                templateId: templateId,
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Template deleted successfully!',
                                });

                                // Reload the page
                                location.reload();
                            },
                            error: function(error) {
                                // Handle errors
                                console.error("Error deleting color: " + error);
                            }
                        });
                    }
                });
            });

            // delete thumbnail
            $(".delete_thumbnail").click(function() {
                var thumbnailId = $(this).data('thumbnail-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: "Delete Thumbnail",
                    text: "Are you sure you want to delete this thumbnail?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed the deletion, proceed with AJAX request
                        $.ajax({
                            type: "POST",
                            url: "admin_delete_thumbnail.php",
                            data: {
                                thumbnailId: thumbnailId,
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Thumbnail deleted successfully!',
                                });

                                // Reload the page
                                location.reload();
                            },
                            error: function(error) {
                                // Handle errors
                                console.error("Error deleting color: " + error);
                            }
                        });
                    }
                });
            });

            








        });

        // start color button
        document.getElementById('Add_color').addEventListener('click', function() {
            document.getElementById('colorInput').style.display = 'block';
            document.getElementById('colorFields').style.display = 'block';
            document.getElementById('cancel_color').style.display = 'block';
            document.getElementById('Add_color').style.display = 'none';
        });

        document.getElementById('cancel_color').addEventListener('click', function() {
            document.getElementById('colorInput').style.display = 'none';
            document.getElementById('colorFields').style.display = 'none';
            document.getElementById('cancel_color').style.display = 'none';
            document.getElementById('Add_color').style.display = 'block';
        });

        // end color button

        // start template button
        document.getElementById('Add_template').addEventListener('click', function() {
            document.getElementById('templateInput').style.display = 'block';
            document.getElementById('TemplateFields').style.display = 'block';
            document.getElementById('cancel_template').style.display = 'block';
            document.getElementById('Add_template').style.display = 'none';
        });

        document.getElementById('cancel_template').addEventListener('click', function() {
            document.getElementById('templateInput').style.display = 'none';
            document.getElementById('TemplateFields').style.display = 'none'; // Change this to 'TemplateFields'
            document.getElementById('cancel_template').style.display = 'none';
            document.getElementById('Add_template').style.display = 'block';
        });


        // end template button

        // start thumbnail button
        document.getElementById('Add_thumbnail').addEventListener('click', function() {
            document.getElementById('thumbnailInput').style.display = 'block';
            document.getElementById('thumbnailFields').style.display = 'block';
            document.getElementById('cancel_thumbnail').style.display = 'block';
            document.getElementById('Add_thumbnail').style.display = 'none';
        });

        document.getElementById('cancel_thumbnail').addEventListener('click', function() {
            document.getElementById('thumbnailInput').style.display = 'none';
            document.getElementById('thumbnailFields').style.display = 'none'; // Change this to 'TemplateFields'
            document.getElementById('cancel_thumbnail').style.display = 'none';
            document.getElementById('Add_thumbnail').style.display = 'block';
        });


        // end thumbnail button




        // Get references to the input fields and the container for color fields
        const colorNumberInput = document.getElementById('color_number');
        const colorFieldsContainer = document.getElementById('colorFields');

        // Add an event listener to the color_number input
        colorNumberInput.addEventListener('input', function() {
            // Get the selected number of colors
            const numberOfColors = parseInt(this.value);

            // Clear the existing color fields
            colorFieldsContainer.innerHTML = '';

            // Create and add input fields for Color Name and Color Code
            for (let i = 1; i <= numberOfColors; i++) {
                const colorNameLabel = document.createElement('label');
                colorNameLabel.textContent = `New Color Name ${i}:`;

                const colorNameInput = document.createElement('input');
                colorNameInput.type = 'text';
                colorNameInput.name = `newcolorName${i}`;
                colorNameInput.id = `newcolorName${i}`;

                const colorCodeLabel = document.createElement('label');
                colorCodeLabel.textContent = `New Color Code ${i}:`;

                const colorCodeInput = document.createElement('input');
                colorCodeInput.type = 'text';
                colorCodeInput.name = `newcolorCode${i}`;
                colorCodeInput.id = `newcolorCode${i}`;

                // Add line breaks for spacing
                const lineBreak1 = document.createElement('br');
                const lineBreak2 = document.createElement('br');
                const lineBreak3 = document.createElement('br');

                // Append elements to the container
                colorFieldsContainer.appendChild(colorNameLabel);
                colorFieldsContainer.appendChild(colorNameInput);
                colorFieldsContainer.appendChild(lineBreak1);
                colorFieldsContainer.appendChild(colorCodeLabel);
                colorFieldsContainer.appendChild(colorCodeInput);
                colorFieldsContainer.appendChild(lineBreak2);
                colorFieldsContainer.appendChild(lineBreak3);
            }
        });





        const NoTemplate = document.getElementById('No_template');
        const TemplateFields = document.getElementById('TemplateFields');

        // Add an event listener to the color_number input
        NoTemplate.addEventListener('input', function() {
            // Get the selected number of colors
            const numberOfTemplate = parseInt(this.value);

            // Clear the existing color fields
            TemplateFields.innerHTML = '';

            // Create and add input fields for Color Name and Color Code
            for (let i = 1; i <= numberOfTemplate; i++) {
                const templateNameLabel = document.createElement('label');
                templateNameLabel.textContent = `Template Name ${i}:`;

                const templateNameInput = document.createElement('input');
                templateNameInput.type = 'text';
                templateNameInput.name = `templateName${i}`;
                templateNameInput.id = `templateName${i}`;

                const templateCodeLabel = document.createElement('label');
                templateCodeLabel.textContent = `Template File ${i}:`;

                //<input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

                const templateCodeInput = document.createElement('input');
                templateCodeInput.type = 'file';
                templateCodeInput.name = `templateCode${i}`;
                templateCodeInput.id = `templateCode${i}`;
                templateCodeInput.accept = `image/*`;


                // Add line breaks for spacing
                const lineBreak1 = document.createElement('br');
                const lineBreak2 = document.createElement('br');
                const lineBreak3 = document.createElement('br');

                // Append elements to the container
                TemplateFields.appendChild(templateNameLabel);
                TemplateFields.appendChild(templateNameInput);
                TemplateFields.appendChild(lineBreak1);
                TemplateFields.appendChild(templateCodeLabel);
                TemplateFields.appendChild(templateCodeInput);
                TemplateFields.appendChild(lineBreak2);
                TemplateFields.appendChild(lineBreak3);
            }
        });






        //<label for="No_thumbnail">No. Thumbnail</label><br>
        //<input type="number" id="No_thumbnail" name="No_thumbnail" min="0" placeholder="0"><br><br>

        //<div id="thumbnailFields" style="display: block;"> </div>

        const NoThumbnail = document.getElementById('No_thumbnail');
        const ThumbnailFields = document.getElementById('thumbnailFields');

        // Add an event listener to the color_number input
        NoThumbnail.addEventListener('input', function() {
            // Get the selected number of colors
            const numberOfThumbnail = parseInt(this.value);

            // Clear the existing color fields
            ThumbnailFields.innerHTML = '';

            // Create and add input fields for Color Name and Color Code
            for (let i = 1; i <= numberOfThumbnail; i++) {


                const thumbnailCodeLabel = document.createElement('label');
                thumbnailCodeLabel.textContent = `Thumbnail File ${i}:`;

                //<input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

                const thumbnailCodeInput = document.createElement('input');
                thumbnailCodeInput.type = 'file';
                thumbnailCodeInput.name = `thumbnailCode${i}`;
                thumbnailCodeInput.id = `thumbnailCode${i}`;
                thumbnailCodeInput.accept = `image/*`;


                // Add line breaks for spacing

                const lineBreak2 = document.createElement('br');
                const lineBreak3 = document.createElement('br');

                // Append elements to the container

                ThumbnailFields.appendChild(thumbnailCodeLabel);
                ThumbnailFields.appendChild(thumbnailCodeInput);
                ThumbnailFields.appendChild(lineBreak2);
                ThumbnailFields.appendChild(lineBreak3);
            }
        });
    </script>



</body>

</html>