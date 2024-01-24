<?php include 'config.php';

// Add
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $namacategory = $_POST["namacategory"];
    $query = "INSERT INTO categories (nama) VALUES ('$namacategory')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Data '.$namacategory.'berhasil disimpan'); window.location = 'category.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location = 'category.php';</script>";
    }
}

// Edit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $idcategory = $_POST["idcategory"];
    $namacategory = $_POST["namacategory"];
    $query = "UPDATE categories SET nama='$namacategory' WHERE id='$idcategory'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate'); window.location = 'category.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate'); window.location = 'category.php';</script>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ZenZet News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

    <!-- Syntax Highlighter -->
    <link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shThemeDefault.css" media="all">

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Normalize/Reset CSS-->
    <link rel="stylesheet" href="css/normalize.min.css">
    <!-- Main CSS-->
    <link rel="stylesheet" href="css/main.css">

    <style>
        body {
            display: flex;
            background-color: #f8f9fa;
            /* Warna seragam */
        }

        #main-wrapper {
            flex: 1;
            padding-left: 0;
        }

        #sidebar {
            width: 200px;
            background-color: orange;
            /* Warna orange */
            padding: 20px;
        }

        table thead {
            background-color: orange;
            /* Warna orange */
            color: white;
        }

        .main-content {
            background-color: white;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <?php require_once "./sidebar.php" ?>

        <div id="main-wrapper">
            <div class="main-content">
                <div class="row pt-3 pb-3 d-flex align-content-center text-center text-white rounded-4 bg-dark" style="height:100px;">
                    <h2 class="align-middle" style="color:white;">CATEGORY</h2>
                </div>

                <div class="row justify-content-center">
                    <table class="table" style="text-align: center;">
                    <thead style="height:75px;">
                            <tr>
                                <th scope="col">ID Category</th>
                                <th scope="col">Name Category</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody class="table-success">
                            <?php
                            include "config.php";
                            $qry = "SELECT * FROM categories";
                            $exec = mysqli_query($con, $qry);

                            while ($data = mysqli_fetch_assoc($exec)) {
                            ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $data['id'] ?>">Edit</button>
                                        <a class="btn btn-danger" href="categories-delete.php?id=<?= $data['id'] ?>">Delete</a>
                                    </td>
                                </tr>

                                <!-- Edit modal-->
                                <div class="modal fade" id="editCategoryModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCategoryModalLabel">Edit Data Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST">
                                                    <div class="mb-3 mt-3">
                                                        <label for="idcategory">Id Category :</label>
                                                        <input type="text" class="form-control" name="idcategory" value="<?= $data['id'] ?>" readonly>
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="namacategory">Nama Category :</label>
                                                        <input type="text" class="form-control" name="namacategory" value="<?= $data['nama'] ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <a class="btn btn-primary d-block mx-auto mt-3" style="width: 120px " href="#" role="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah Data</a>

                <!-- Add Modal -->
                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel">Tambah Data Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="mb-3 mt-1">
                                        <label for="namacategory">Nama Category :</label>
                                        <input type="text" class="form-control" name="namacategory" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>