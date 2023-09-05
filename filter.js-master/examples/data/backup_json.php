<?php
$json = array();

$name = "Yojimb2ssssssssssssssssssssaawe123123os";
$outline = "A crafty ronin comes to a town divided by two criminal gangs and decides to play them against each other to free the town.";
$rating = 0;
$director = "Akira Kurosawa";
$year = 1961;
$stars = "Toshirô Mifune";
$runtime = 100;
$genre = "Action";
$certificate = "TV_MA";
$date = "1981-08-02T10:29:29+05:30";
$actor = "Toshirô Mifune";
$id = 250;


$json[] = array(
  "name" => $name,
  "outline" => $outline,
  "rating" => $rating,
  "director" => $director,
  "year" => $year,
  "stars" => $stars,
  "runtime" => $runtime,
  "genre" => $genre,
  "certificate" => $certificate,
  "date" => $date,
  "actor" => $actor,
  "id" => $id,
);


echo json_encode($json);