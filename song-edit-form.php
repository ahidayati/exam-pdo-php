<?php

include 'header.php';
include 'class/Song.php';
include 'class/Artist.php';

$song = new Song;
$newSong = $_GET['edit'];

$viewSong = $song->displaySong($newSong);
//var_dump($viewSong);
?>

<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-secondary my-2 mx-2" href="index.php">Back to Artists</a>
    </div>
</div>

<div class="container">
    <h1>Form</h1>
    <div class="col-6">
        <form action="song-edit-form-treat.php" method="post">

            <div class="visually-hidden">
                <label for="idInput" class="form-label">Song ID</label>
                <input type="text" class="form-control" id="idInput" name="id" value="<?php echo $viewSong['id'] ?>">
            </div>

            <div class="mb-3">
                <label for="titleInput" class="form-label">Song Title</label>
                <input type="text" class="form-control" id="titleInput" name="title" value="<?php echo $viewSong['title'] ?>">
            </div>

            <div class="mb-3">
                <label for="timeInput" class="form-label">Duration (in seconds)</label>
                <input type="number" class="form-control" id="timeInput" name="time" value="<?php echo $viewSong['time'] ?>">
            </div>

            <div class="mb-3">
                <label for="publishedInput" class="form-label">Published Date</label>
                <input type="date" class="form-control" id="publishedInput" name="published" value="<?php echo $viewSong['published_at'] ?>">
            </div>

            <div class="mb-3">

                <label for="artistInput" class="form-label">Artist (If the artist name is not in the dropdown, add the artist first)</label>
                <select class="form-select" id="artistInput" name="artist">
                    <?php
                    $artist = new Artist();
                    $artistNameList = $artist->displayArtistDistinct();

                    foreach ($artistNameList as $artistName){
                        ?>
                        <option value="<?php echo $artistName['id'] ?>"
                            <?php
                            if($artistName['id'] === $viewSong['id']){
                                echo "selected";
                            }
                            ?>
                        >
                            <?php
                            echo $artistName['name'];
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </form>
    </div>
</div>