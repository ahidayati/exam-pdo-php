<?php

include_once 'Connection.php';
class Artist extends Connection
{
    public function displayAllArtists()
    {
        $pdo = $this->connection();
        $query = "SELECT * FROM artist;";
        $results = $pdo->query($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function viewDetailsArtist($idInput)
    {
        $pdo = $this->connection();
        $query = "SELECT * FROM `artist` WHERE `id`=".$idInput.";";
        $results = $pdo->query($query);
        $results->execute();

        $row = $results->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function addArtist($nameInput, $ageInput)
    {
        $pdo = $this->connection();
        $query = 'INSERT INTO `artist`(`name`, `age`) VALUES (:value_1, :value_2);';

        $results = $pdo->prepare($query);

        $results->execute([
            ':value_1' => $nameInput,
            ':value_2' => $ageInput
        ]);
    }

    public function updateArtist($nameInput, $ageInput, $idInput)
    {
        $pdo = $this->connection();
        $query = 'UPDATE `artist` SET `name`= :value_1,`age`= :value_2 WHERE `id`= :value_3';

        $results = $pdo->prepare($query);

        $results->execute([
            ':value_1' => $nameInput,
            ':value_2' => $ageInput,
            ':value_3' => $idInput
        ]);
    }

    public function displayArtistBySong($idInput)
    {
        $pdo = $this->connection();
        $query = "SELECT artist.name FROM song JOIN artist ON song.artist_id = artist.id WHERE artist.id = :param_id;";
        $results = $pdo->prepare($query);
        $results->execute([
            ':param_id' =>$idInput,
        ]);

        $row = $results->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function displayArtistDistinct()
    {
        $pdo = $this->connection();
        $query = "SELECT DISTINCT `name`, `id` FROM `artist`;";
        $results = $pdo->prepare($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function deleteArtist($idInput)
    {
        $pdo = $this->connection();
        $query = 'DELETE FROM `artist` WHERE `id`= :value_1;';

        $results = $pdo->prepare($query);

        $results->execute([
            ':value_1' => $idInput
        ]);
    }
}