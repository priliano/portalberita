<?php include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $imageId = $_GET['id'];

    $imageData = $imageService->findById($imageId);
} else {
    // Handle invalid request, redirect, or display a message
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                <!-- Display the image data in a form for editing -->
                <h2>Edit Image</h2>
                <form method="post" action="update_image.php">
                    <input type="hidden" name="id" value="<?= $imageData['id'] ?>">
                    <img src="<?php echo $serverUrl . "/" . $imageData['url'] ?>" alt="<?= $imageData['alt'] ?>" style="max-width: 500px; max-height: 500px;">

                    <div class="mb-3">
                        <label for="alt" class="form-label">Alt Text</label>
                        <input type="text" class="form-control" id="alt" name="alt" value="<?= $imageData['alt'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= $imageData['url'] ?>" required readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Image</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>