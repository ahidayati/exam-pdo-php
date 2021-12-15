<?php

include 'header.php';

include 'class/Artist.php';

$artist = new Artist;
$newArtist = $_GET['edit'];

$viewArtist = $artist->viewDetailsArtist($newArtist);
?>

<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-secondary my-2 mx-2" href="index.php">Back to Artists</a>
    </div>
</div>

<div class="container">
    <h1>Form</h1>
    <div class="col-6">
        <form action="artist-edit-form-treat.php" method="post">
            <div class="visually-hidden">
                <label for="idInput" class="form-label">Artist ID</label>
                <input type="text" class="form-control" id="idInput" name="id" value="<?php echo $viewArtist['id'] ?>">
            </div>

            <div class="mb-3">
                <label for="nameInput" class="form-label">Artist Name</label>
                <input type="text" class="form-control" id="nameInput" name="name" value="<?php echo $viewArtist['name'] ?>">
            </div>

            <div class="mb-3">
                <label for="ageInput" class="form-label">Age</label>
                <input type="number" class="form-control" id="ageInput" name="age" value="<?php echo $viewArtist['age'] ?>">
            </div>

            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </form>
    </div>
</div>