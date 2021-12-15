<?php
include 'header.php';
include 'class/Artist.php';

$i = 1;
$artist = new Artist();


?>

<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-secondary my-2" href="artist-add-form.php"><i class="fas fa-plus"></i> Add Artist</a>
    </div>
    <h1><i class="fas fa-user"></i> Artists</h1>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Artist Name</th>
                <th class="text-center" scope="col" colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $displayArtists = $artist->displayAllArtists();

            foreach ($displayArtists as $artistItem){
            ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $artistItem['name'] ?></td>

                <!--action buttons-->
                <td class="text-center"><a href="artist-details.php?view=<?php echo $artistItem['id'] ?>" title="View"><i class="fas fa-eye"></i></a></td>
                <td class="text-center"><a href="artist-edit-form.php?edit=<?php echo $artistItem['id'] ?>" title="Edit"><i class="fas fa-edit"></i></a></td>
                <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $artistItem['id'] ?>" title="Delete"><i class="far fa-trash-alt"></i></a></td>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $artistItem['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Artist</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete "<?php echo $artistItem['name'] ?>" data?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, I change my mind</button>
                                <a type="button" class="btn btn-danger" href="artist-delete.php?remove=<?php echo $artistItem['id'] ?>">Delete</a>
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
    </div>
</div>

<?php
include 'footer.php';