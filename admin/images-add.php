<?php require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image_add'])) {
    $result = $imageService->save('image', $_POST['alt']);

    Logger::info($result);
    if ($result) {
        header('Location: images.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <div class="row pt-3 pb-3 text-center">
                    <h1>Formulir</h1>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="alt" class="form-label">Alt Text</label>
                        <input type="text" class="form-control" id="alt" name="alt" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image File</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" name="image_add" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>