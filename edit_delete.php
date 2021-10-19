<?php

require 'lib/select_data.php';
require 'lib/delete_data.php';
require 'lib/update_data.php';

$id = $_GET['id'];

// Jika halaman tidak memiliki GET
if (!isset($id)) {
    header('location: index.php', true, 301);
    exit();
}

$result = select_data_by_id($id);

// Jika hasil query tidak ditemukan
if (!$result) {
    header('location: index.php', true, 301);
    exit();
}

// Ketika tombol hapus ditekan
if (isset($_POST['hapus'])) {
    $result_delete = delete_data_by_id($id);

    if ($result_delete) {
        header('location: index.php', true, 301);
        exit();
    } else {
        echo "<script>alert('Hapus data gagal');</script>";
    }
}

// Ketika tombol edit ditekan
if (isset($_POST['language']) && isset($_POST['status']) && isset($_POST['score'])) {
    $result_update = update_data($id, $_POST['language'], $_POST['status'], $_POST['score']);

    if ($result_update) {
        echo "<script>alert('Edit data berhasil');window.location.href='edit_delete.php?id=$id';</script>";
    } else {
        echo "<script>alert('Edit data gagal');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title>PHP dan MySQL | Edit / Delete Data</title>
</head>

<body>
    <!-- Navbar -->
    <?php include 'components/Navbar.php' ?>

    <!-- Input -->
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="index.php" class="btn btn-primary mb-3">&lt; Kembali</a>
            <form action="edit_delete.php?id=<?= $id ?>" method="POST"><button class="btn btn-danger mb-3" name="hapus" value="hapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus Data</button></form>
        </div>
        <div class="card">
            <div class="card-header">
                Input Data
            </div>
            <div class="card-body">
                <form action="edit_delete.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3">
                        <label for="languageInput" class="form-label">Language</label>
                        <input type="text" class="form-control" id="languageInput" name="language" value="<?= $result['language'] ?>" require>
                    </div>
                    <div class="mb-3">
                        <label for="statusInput" class="form-label">Status</label>
                        <select id="statusInput" name="status" class="form-select">
                            <option disabled>-- pilih --</option>
                            <option value="pass" <?= ($result['status'] == 'pass') ? 'selected' : ''; ?>>Pass</option>
                            <option value="fail" <?= ($result['status'] == 'fail') ? 'selected' : ''; ?>>Fail</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scoreInput" class="form-label">Score</label>
                        <input type="number" class="form-control" name="score" id="scoreInput" value="<?= $result['score'] ?>" require>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>