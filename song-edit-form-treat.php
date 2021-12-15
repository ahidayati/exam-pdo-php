<?php

include 'class/Song.php';

$song = new Song();
$newSong = $_POST;

$song->updateSong($newSong['title'], $newSong['time'], $newSong['published'],  $newSong['id'], $newSong['artist']);

header('location: artist-details.php?view='.$newSong['artist'] );