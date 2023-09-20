<?php

echo '
                                                                 <div class="col-md-6 col-lg-6 col-xl-6">';

if ($published_game_id) {

  $sqlPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
  $queryPublished = $conn->query($sqlPublished);
  while ($fetchedPublished = $queryPublished->fetch_assoc()) {
    $built_game_id = $fetchedPublished['built_game_id'];
    $game_name = $fetchedPublished['game_name'];
    $category = $fetchedPublished['category'];
    $edition = $fetchedPublished['edition'];
    $published_date = $fetchedPublished['published_date'];
    $creator_id = $fetchedPublished['creator_id'];
    $logo_path = $fetchedPublished['logo_path'];
    $marketplace_price = $fetchedPublished['marketplace_price'];

    echo '
                                                                     <h5 class="card-title">' . $game_name . '</h5>
                                                                 ';
  }
} elseif ($built_game_id) {

  $sqlBuilt = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
  $queryBuilt = $conn->query($sqlBuilt);
  while ($fetchedBuilt = $queryBuilt->fetch_assoc()) {
    $game_id = $fetchedBuilt['game_id'];
    $name = $fetchedBuilt['name'];

    echo '
                                                                                         <h5 class="card-title">' . $name . '</h5>
                                                                                     ';
  }
} elseif ($added_component_id) {

  $sqlGetComponentId = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
  $queryGetComponentId = $conn->query($sqlGetComponentId);
  while ($fetchedGetComponentId = $queryGetComponentId->fetch_assoc()) {
    $this_component_id = $fetchedGetComponentId['component_id'];

    $sqlComponentName = "SELECT * FROM game_components WHERE component_id = $this_component_id";
    $queryComponentName = $conn->query($sqlComponentName);
    while ($fetchedComponentName = $queryComponentName->fetch_assoc()) {
      $component_name = $fetchedComponentName['component_name'];

      echo '<h5>' . $component_name . '</h5>';
    }
  }
}


if ($published_game_id) {

  echo '

                                                                     <div class="d-flex flex-row">
                                                                         <div class="text-danger mb-1 me-2">';

  $rating = "SELECT rating FROM ratings WHERE published_game_id = $published_game_id";
  $sqlGetRating = $conn->query($rating);
  $ratingsArray = [];
  while ($fetchedRating = $sqlGetRating->fetch_assoc()) {
    $ratingsArray[] = $fetchedRating['rating'];
  }

  $ratingCounts = array(
    '5' => 0,
    '4' => 0,
    '3' => 0,
    '2' => 0,
    '1' => 0
  );

  foreach ($ratingsArray as $ratingValue) {
    if (array_key_exists($ratingValue, $ratingCounts)) {
      $ratingCounts[$ratingValue]++;
    }
  }


  $count5 = $ratingCounts['5'];
  $count4 = $ratingCounts['4'];
  $count3 = $ratingCounts['3'];
  $count2 = $ratingCounts['2'];
  $count1 = $ratingCounts['1'];

  $ratingSum = array_sum($ratingsArray);
  $ratingCount = count($ratingsArray);
  $averageRating = ($ratingCount > 0) ? ($ratingSum / $ratingCount) : 0;

  $fullStars = round($averageRating);

  if ($ratingCount !== 0) {
    for ($i = 1; $i <= $fullStars; $i++) {
      echo '<i class="fa fa-star"></i>';
    }
  }


  echo '

                                                                         </div>

                                                                         <span>';

  if ($ratingCount == 0) {
    echo 'No Ratings Yet';
  } else if ($ratingCount !== 0) {
    echo $averageRating;
  }

  echo '
                                                                         </span>
                                                                     </div>

                                                                     ';
}

echo '
                                                                     <div class="mt-1 mb-0 text-muted">';


if ($published_game_id) {
  echo '
                                                                         <span>Category: ' . $category . '</span>
                                                                         <span class="text-primary"> • </span>

                                                                         <span>Edition: ' . $edition . '</span>
                                                                        
                                                                         ';
} elseif ($built_game_id) {
} elseif ($added_component_id) {
  echo 'asdasd';
}



echo '
                                                                     </div>';

if ($published_game_id) {
  echo '
                                                                         <p class="text-truncate mb-4 mb-md-0">
                                                                             ' . $creator_id . '
                                                                         </p>
                                                                         ';
} elseif ($built_game_id) {
  echo 'Built Game';
} elseif ($added_component_id) {
  echo 'Game Component';
} else {
  echo 'Error';
}



echo '

                                                                 </div>

                                                                 <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">

                                                                     <div class="d-flex flex-row align-items-center mb-1">
                                                                         <h4 class="mb-1 me-1">$13.99</h4>

                                                                         <span class="text-danger">
                                                                             <s>$20.99</s>
                                                                         </span>
                                                                     </div>

                                                                     <h6 class="text-success">Free shipping</h6>
                                                                     <div class="d-flex flex-column mt-4">
                                                                         <button class="btn btn-primary btn-sm" type="button">Details</button>
                                                                         <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                                             Add to wishlist
                                                                         </button>
                                                                     </div>
                                                                 </div>

                                                             </div>
                                                         </div>
                                                     </div>
                                                        
                                                         ';


?>

</div>

</div>