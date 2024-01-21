<?php require_once "config.php" ?>

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
        <!-- <div class="row pt-3 pb-3 d-flex align-content-center text-center text-white rounded-4 bg-dark" style="height:100px;">
          <h2 class="align-middle">Data Images</h2>
        </div> -->
        <table class="table">
          <thead style="height:75px;">
            <tr>
              <th class="align-middle" scope="col">ID</th>
              <th class="align-middle" scope="col">Preview</th>
              <th class="align-middle" scope="col">Alt</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($imageService->list() as $imageData) { ?>
              <tr>
                <td class="align-middle"><?= $imageData['id'] ?></td>
                <td class="align-middle">
                  <img src="<?php echo $serverUrl . "/" . $imageData['url'] ?>" alt="<?= $imageData['alt'] ?>" style="max-width: 200px; max-height: 200px;">
                </td>
                <td class="align-middle"><a href="<?php echo $serverUrl . "/" . $imageData['url'] ?>"><?= $imageData['alt'] ?></a></td>
                <td>
                  <a class="btn btn-success" href="images-edit.php?id=<?= $imageData['id'] ?>" role="button">Edit</a>
                  <a class="btn btn-danger" href="images-delete.php?id=<?= $imageData['id'] ?>" role="button">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <a class="btn btn-primary" href="images-add.php" role="button">Add Image</a>
      </div>
    </div>
  </div>
</body>

</html>