<?php

require 'lib/insert_data.php';

// Eksekusi function jika inputan sudah diisi
if (isset($_POST['language']) && isset($_POST['status']) && isset($_POST['score'])) {
    $result = insert_data($_POST['language'], $_POST['status'], $_POST['score']);

    if ($result) {
        echo "<script>alert('Data berhasil dimasukkan!');</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan');</script>";
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
    <title>PHP dan MySQL | Input Data</title>
</head>

<body>
    <!-- Navbar -->
    <?php require 'components/Navbar.php' ?>

    <!-- Input -->
    <div class="container">
        <a href="index.php" class="btn btn-primary mb-3">&lt; Kembali</a>
        <div class="card">
            <div class="card-header">
                Input Data
            </div>
            <div class="card-body">
                <form action="input.php" method="POST">
                    <div class="mb-3">
                        <label for="languageInput" class="form-label">Language</label>
                        <input type="text" class="form-control" id="languageInput" name="language" require>
                    </div>
                    <div class="mb-3">
                        <label for="statusInput" class="form-label">Status</label>
                        <select id="statusInput" name="status" class="form-select">
                            <option selected disabled>-- pilih --</option>
                            <option value="pass">Pass</option>
                            <option value="fail">Fail</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scoreInput" class="form-label">Score</label>
                        <input type="number" class="form-control" name="score" id="scoreInput" require>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>