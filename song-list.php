<?php
include 'header.php';
include 'class/Song.php';
include 'class/Artist.php';

$i = 1;
$song = new Song();
$artist = new Artist();


?>

<div class="container">
    <div class="d-flex flex-row-reverse">

        <a class="btn btn-secondary my-2" href="song-add-form.php"><i class="fas fa-plus"></i> Add Song</a>

        <div class="my-2 mx-2">
            <form action="" method="get">
                <label for="searchInput" class="form-label visually-hidden">Search</label>
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="&#xF002; Search Song Title" style="font-family:Arial, FontAwesome"
                    <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        echo "value='".$_GET['search']."'";
                    }
                    ?>
                >
            </form>
        </div>
    </div>
    <h1><i class="fas fa-music"></i> Songs</h1>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Song Title</th>
                <th class="text-center" scope="col">Artist</th>
                <th class="text-center" scope="col">Duration</th>
                <th class="text-center" scope="col">Published Date</th>
                <th class="text-center" scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php

            if(isset($_GET['search'])){
                $displaySongs = $song->searchSong($_GET['search']);
            }
            else {
                $displaySongs = $song->displayAllSongs();
            }


            foreach ($displaySongs as $songItem){
                ?>
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo $songItem['title'] ?></td>
                    <td class="text-center"><?php echo $artist->displayArtistBySong($songItem['artist_id'])['name'] ?></td>
                    <td class="text-center"><?php echo date('i:s' ,$songItem['time']) ?></td>
                    <td class="text-center"><?php echo date('d-m-Y' , strtotime($songItem['published_at'])) ?></td>

                    <!--action buttons-->
                    <td class="text-center"><a href="song-edit-form.php?edit=<?php echo $songItem['id'] ?>" title="Edit"><i class="fas fa-edit"></i></a></td>
                    <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $songItem['id'] ?>" title="Delete"><i class="far fa-trash-alt"></i></a></td>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $songItem['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Song</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete "<?php echo $songItem['title'] ?>" song?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, I change my mind</button>
                                    <a type="button" class="btn btn-danger" href="song-delete.php?remove=<?php echo $songItem['id'] ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <?php
        if(empty($displaySongs)){
            echo "<div class='text-center fs-3 mt-5'>Sorry, the song that you searched does not exist. Please search for another song.</div>";
        }
        ?>

    </div>
</div>

<?php
include 'footer.php';