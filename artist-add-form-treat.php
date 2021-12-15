<?php

include 'class/Artist.php';

$artist = new Artist();
$newArtist = $_POST;

$artist->addArtist($newArtist['name'], $newArtist['age']);

header('location: index.php');