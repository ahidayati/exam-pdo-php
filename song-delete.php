<?php

include 'class/Song.php';

$song = new Song();
$newSong = $_GET['remove'];

//var_dump($newSong);
$song->deleteSong($newSong);

header('location: song-list.php');