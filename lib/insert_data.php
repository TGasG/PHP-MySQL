<?php

require 'connect.php';

function insert_data($language, $status, $score)
{
    global $conn;

    $score = (int) $score; // Memastikan tipe data score adalah integer

    $stmt = $conn->prepare('INSERT INTO learn (language, status, score) VALUES (?, ?, ?)');
    $stmt->bind_param('ssi', $language, $status, $score);
    return $stmt->execute();
}
