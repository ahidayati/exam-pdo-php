<?php

include "header.php";
include 'class/Artist.php';

try {
    $artist= new Artist();
    $newArtist = $_GET['remove'];

    $artist->deleteArtist($newArtist);

    header('location: artist-list.php');
}catch (Exception $e){
    echo "<div class='text-center fs-3 mt-5'>In order to delete an artist you must first delete all the songs related to the artist.</div>";
}