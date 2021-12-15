<?php

include 'class/Artist.php';

$artist = new Artist;
$newArtist = $_POST;

$artist->updateArtist($newArtist['name'], $newArtist['age'], $newArtist['id']);

header('location: index.php');