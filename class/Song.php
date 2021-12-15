<?php

include_once 'Connection.php';
class Song extends Connection
{
    public function displayAllSongs()
    {
        $pdo = $this->connection();
        $query = "SELECT * FROM song;";
        $results = $pdo->prepare($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function displaySong($idInput)
    {
        $pdo = $this->connection();
        $query = "SELECT * FROM song WHERE `id`=".$idInput.";";
        $results = $pdo->prepare($query);
        $results->execute();

        $row = $results->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function displaySongByArtist($idInput)
    {
        $pdo = $this->connection();
        $query = "SELECT song.title, song.time, song.published_at, song.id FROM song JOIN artist ON song.artist_id = artist.id WHERE artist.id = :param_id;";
        $results = $pdo->prepare($query);
        $results->execute([
            ':param_id' =>$idInput,
        ]);

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function searchSong($searchInput)
    {
        $pdo = $this->connection();
        $query = "SELECT * FROM `song` WHERE `title` LIKE '%".$searchInput."%';";

        $results = $pdo->query($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function addSong($titleInput, $timeInput, $publishedInput, $artistIdInput)
    {
        $pdo = $this->connection();
        $query = 'INSERT INTO `song`(`title`, `time`, `published_at`, `artist_id`) VALUES (:value_1, :value_2, :value_3, :value_4);';

        $results = $pdo->prepare($query);

        $results->execute([
            ':value_1' => $titleInput,
            ':value_2' => $timeInput,
            ':value_3' => $publishedInput,
            ':value_4' => $artistIdInput
        ]);
    }

    public function deleteSong($idInput)
    {
        $pdo = $this->connection();
        $query = 'DELETE FROM `song` WHERE `id`= :value_1;';

        $results = $pdo->prepare($query);

        $results->execute([
            ':value_1' => $idInput
        ]);
    }

    public function updateSong($titleInput, $timeInput, $publishedInput, $artistIdInput, $songIdInput)
    {
        $pdo = $this->connection();
        $query = 'UPDATE `song` SET `title`= :value_1,`time`= :value_2, `published_at`= :value_3, `artist_id`= :value_4 WHERE `id`= :value_5';

        $results = $pdo->prepare($query);

        $results->execute([
            ':value_1' => $titleInput,
            ':value_2' => $timeInput,
            ':value_3' => $publishedInput,
            ':value_4' => $artistIdInput,
            ':value_5' => $songIdInput
        ]);
    }
}