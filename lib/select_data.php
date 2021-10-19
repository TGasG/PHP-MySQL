<?php

require 'connect.php';

function select_all_data()
{
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM learn');
    $stmt->execute();
    $result = $stmt->get_result();

    $datas = array();
    while ($row = $result->fetch_assoc()) {
        array_push($datas, $row);
    }

    return $datas;
}

function select_data_by_id($id)
{
    global $conn;

    $id = (int) $id;

    $stmt = $conn->prepare('SELECT * FROM learn WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_assoc();
}
