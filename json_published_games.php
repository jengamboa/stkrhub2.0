<?php
include "connection.php";

$data = array();

$sql = "SELECT * FROM published_built_games";
$result = $conn->query($sql);

while ($published_built_games = $result->fetch_assoc()) {

  $id = $published_built_games['published_game_id'];
  $name = $published_built_games['game_name'];
  $outline = $published_built_games['short_description'];

  $rating = "SELECT rating FROM ratings WHERE published_game_id = $id";
  $sqlGetRating = $conn->query($rating);
  $ratingsArray = [];
  while ($fetchedRating = $sqlGetRating->fetch_assoc()) {
    $ratingsArray[] = $fetchedRating['rating'];
  }
  $ratingSum = array_sum($ratingsArray);
  $ratingCount = count($ratingsArray);
  $averageRating = ($ratingCount > 0) ? ($ratingSum / $ratingCount) : 0;

  $director = $published_built_games['creator_id'];

  $datetimeString = $published_built_games['published_date'];
  $datetime = new DateTime($datetimeString);
  $formattedDate = $datetime->format('F d, Y');
  $formattedDate = (string) $formattedDate;


  $stars = (float)$published_built_games['marketplace_price'];
  //

  $runtime = (int) $published_built_games['max_playtime'];
  $genre = $published_built_games['category'];
  $certificate = ""; //

  $formattedDate2 = $datetime->format('Y-m-d\TH:i:sP');

  $actor = ""; //

  $data[] = array(
    "name" => $name,
    "outline" => $outline,
    "rating" => $averageRating,
    "director" => $director,
    "year" => $formattedDate,
    "stars" => $stars,
    "runtime" => $runtime,
    "genre" => $genre,
    "certificate" => $certificate,
    "date" => $formattedDate2,
    "actor" => $actor,
    "id" => $id,
  );

}
echo json_encode($data);
?>