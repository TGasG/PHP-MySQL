<?php

require 'connect.php';

function delete_data_by_id($id)
{
    global $conn;

    $id = (int) $id; // Memastikan tipe data id integer

    $stmt = $conn->prepare('DELETE FROM learn WHERE id = ?');
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}
