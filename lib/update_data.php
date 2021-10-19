<?php

require 'connect.php';

function update_data($id, $language, $status, $score)
{
    global $conn;

    $id = (int) $id; // Memastikan id bertipe integer
    $score = (int) $score; // Memastikan tipe data score adalah integer

    $stmt = $conn->prepare('UPDATE learn SET language = ?, status = ?, score = ? WHERE id = ?');
    $stmt->bind_param('ssii', $language, $status, $score, $id);
    return $stmt->execute();
}
