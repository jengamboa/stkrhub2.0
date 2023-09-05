<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="assets/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="assets/css/jquery-ui-1.10.2.custom.min.css" media="screen" rel="stylesheet" type="text/css">
  <link href="assets/css/stream.css" media="screen" rel="stylesheet" type="text/css">
  <script src="assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
  <script src="../dist/filter.js" type="text/javascript"></script>
  <!-- <script src="data/movies.js?<?php echo time(); ?>" type="text/javascript"></script> -->
  <script src="pagination.js?<?php echo time(); ?>" type="text/javascript"></script>

  <link rel="stylesheet" href="../../css/linearicons.css">
  <link rel="stylesheet" href="../../css/owl.carousel.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/themify-icons.css">
  <link rel="stylesheet" href="../../css/nice-select.css">
  <link rel="stylesheet" href="../../css/nouislider.min.css">
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
  <div class="container">
    <h1 class="title">FILTER.JS</h1>
    <div class="sidebar col-md-3">
      <div>
        <h4 class='col-md-6'>Movies (<span id="total_movies">0</span>)</h4>
        <div class="col-md-6 progress">
          <div class="progress-bar" id="stream_progress" style="width: 0%;">0%</div>
        </div>
      </div>
      <div>
        <label class="sr-only" for="searchbox">Search</label>
        <input type="text" class="form-control" id="searchbox" placeholder="Search &hellip;" autocomplete="off">
        <span class="glyphicon glyphicon-search search-icon"></span>
      </div>
      <br>
      <div class="well">
        <fieldset id="rating_criteria">
          <legend>Rating</legend> <span id="rating_range_label" class="slider-label">0 - 5</span>
          <div id="rating_slider" class="slider">
          </div>
          <input type="hidden" id="rating_filter" value="0-5">
        </fieldset>
      </div>
      <div class="well">
        <fieldset id="runtime_criteria">
          <legend>Runtime</legend> <span id="runtime_range_label" class="slider-label">50 mins - 250 mins</span>
          <div id="runtime_slider" class="slider">
          </div>
          <input type="hidden" id="runtime_filter" value="50-250">
        </fieldset>
      </div>

      <!-- <div class="well">
        <fieldset id="year_criteria">
          <legend>Year</legend>
          <select class="form-control" id="year_filter">
            <option value="all">All (2020 - 2023)</option>
            <option value="2020-2023">2020 - 2023</option>

          </select>
        </fieldset>
      </div> -->

      <div class="well">
        <fieldset id="genre_criteria">
          <legend>Genre</legend>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="All" id="all_genre">
              <span>All</span>
            </label>
          </div>

          <?php
          include "../../connection.php";

          $sql = "SELECT category_name FROM categories";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $category_name = $row['category_name'];
              echo '<div class="checkbox">';
              echo '<label>';
              echo '<input type="checkbox" value="' . htmlspecialchars($category_name) . '">';
              echo '<span>' . htmlspecialchars($category_name) . '</span>';
              echo '</label>';
              echo '</div>';
            }
          }

          ?>

        </fieldset>
      </div>
    </div>

    <!-- /.col-md-3 -->
    <div class="col-md-9">
      <div class="row">
        <div class="content col-md-12">
          <div id="pagination" class=""></div>
          <span id="per_page" class="content"></span>
        </div>
      </div>

      <div class="movies row" id="movies"> </div>
    </div>
    <!-- /.col-md-9 -->
  </div>
  <!-- /.container -->

  <script id="movie-template" type="text/html">
    <div class="col-md-4 movie">

      <!-- single item -->
      <div class="thumbnail" style="border: 5px solid red;">
      
        <span class="label label-success rating"><%= rating %>
          <i class="glyphicon glyphicon-star"></i>
        </span>
        
        <div class="caption">
          <h4><%= name %></h4>
          <div class="outline">
            <%= outline %>
            <span class="runtime">
              <i class="glyphicon glyphicon-time"></i>
              <%= runtime %> mins.
            </span>
          </div>
        </div>
            
        <div class="detail">
          <dl>
            <dt>Director</dt>
            <dd><%= director %></dd>
            <dt>Actors</dt>
            <dd><%= stars %></dt>
            <dt>Year</dt>
            <dd><%= year %></dd>
          </dl>
        </div>

      </div> 
      <!-- /single item -->

    </div>  
  </script>

  <script id="genre_template" type="text/html">
    <div class="checkbox">
        <label>
          <input type="checkbox" value="<%= genre %>"> <%= genre %>
        </label>
    </div>
  </script>


</body>

</html>