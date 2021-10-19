<?php
require 'lib/select_data.php';

$results = select_all_data();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title>PHP dan MySQL</title>
</head>

<body>
    <!-- Navbar -->
    <?php include 'components/Navbar.php' ?>

    <!-- Table -->
    <div class="container">
        <a href="input.php" class="btn btn-success mb-3">
            Add new data
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </a>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Language</th>
                    <th scope="col">Status</th>
                    <th scope="col">Score</th>
                    <th scope="col">Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $data) : ?>
                    <tr>
                        <th scope="row"><?= htmlspecialchars($data['id'], ENT_QUOTES, 'UTF-8'); ?></th>
                        <td><?= htmlspecialchars($data['language'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="<?= ($data['status'] == 'pass') ? 'text-success' : 'text-danger' ?>"><?= htmlspecialchars($data['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($data['score'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <form action="edit_delete.php" action="GET">
                                <button class="btn btn-warning" type="submit" name="id" value="<?= $data['id'] ?>">Edit / Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>