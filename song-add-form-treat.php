<?php

include 'class/Song.php';

$song = new Song();
$newSong = $_POST;


$song->addSong($newSong['title'], $newSong['time'], $newSong['published'], $newSong['artist']);

header('location: artist-details.php?view='.$newSong["artist"]);