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
                    <h2 class="align-middle" style="color : white;">COMMENT</h2>
                </div>

                <div class="row justify-content-center">
                    <table class="table" style="text-align: center;">
                    <thead style="height:75px;">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Postingan</th>
                                <th scope="col">Message</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-success">
                            <?php
                            include "config.php";
                            $qry = "SELECT * FROM comment";
                            $exec = mysqli_query($con, $qry);

                            while ($data = mysqli_fetch_assoc($exec)) {
                            ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['user_id'] ?></td>
                                    <td><?= $data['post_id'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewmessage<?= $data['id'] ?>">View</button>
                                    </td>
                                    <td><a class="btn btn-danger" href="comment-delete.php?id=<?= $data['id'] ?>">Delete</a></td>
                                </tr>

                                <!-- View Modal-->
                                <div class="modal fade" id="viewmessage<?= $data['id'] ?>" tabindex="-1" aria-labelledby="viewmessageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewmessageModalLabel">View Data Message</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 mt-0">
                                                    <label for="comment">Comments User:</label>
                                                    <textarea class="form-control" rows="5" id="comment" name="text" readonly><?= $data['message'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</body>

</html>