<?php

include 'header.php';
include 'class/Artist.php';
?>

<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-secondary my-2 mx-2" href="index.php">Back to Artists</a>
    </div>
</div>

<div class="container">
    <h1>Form</h1>
    <div class="col-6">
        <form action="song-add-form-treat.php" method="post">
            <div class="mb-3">
                <label for="titleInput" class="form-label">Song Title</label>
                <input type="text" class="form-control" id="titleInput" name="title">
            </div>

            <div class="mb-3">
                <label for="timeInput" class="form-label">Duration (in seconds)</label>
                <input type="number" class="form-control" id="timeInput" name="time">
            </div>

            <div class="mb-3">
                <label for="publishedInput" class="form-label">Published Date</label>
                <input type="date" class="form-control" id="publishedInput" name="published">
            </div>

            <div class="mb-3">

                <label for="artistInput" class="form-label">Artist (If the artist name is not in the dropdown, add the artist first)</label>
                <select class="form-select" name="artist">
                    <?php
                    $artist = new Artist();
                    $artistNameList = $artist->displayArtistDistinct();

                    foreach ($artistNameList as $artistName){
                    ?>
                    <option value="<?php echo $artistName['id'] ?>">
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