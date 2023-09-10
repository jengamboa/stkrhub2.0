<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    
<ul class="nav nav-tabs" id="myTabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1">Tab 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab2">Tab 2</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab3">Tab 3</a>
    </li>
</ul>

<div class="tab-content">
    <div id="tab1" class="tab-pane fade show active">
        <!-- Content for Tab 1 goes here -->
        <p>This is the content of Tab 1.</p>
    </div>
    <div id="tab2" class="tab-pane fade">
        <!-- Content for Tab 2 goes here -->
        <p>This is the content of Tab 2.</p>
    </div>
    <div id="tab3" class="tab-pane fade">
        <!-- Content for Tab 3 goes here -->
        <p>This is the content of Tab 3.</p>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#myTabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
});
</script>


</body>
</html>