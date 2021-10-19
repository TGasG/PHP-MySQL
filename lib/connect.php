<?php

$host = 'localhost'; // Host MySQL
$user = 'root'; // User MySQL
$password = ''; // Password MySQL
$database = 'webprog'; // Nama Database

$conn = mysqli_connect($host, $user, $password, $database);

// Jika error maka matikan
if (!$conn) {
    die($conn);
}
