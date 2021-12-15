<?php

class Connection
{
    public function connection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=exam_pdo', 'root', '');
        return $pdo;
    }
}