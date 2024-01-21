<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin ZenZet News</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
      background-color: #f8f9fa; /* Warna seragam */
    }

    #main-wrapper {
      flex: 1;
      padding-left: 0;
    }

    #sidebar {
      width: 200px;
      background-color: orange; /* Warna orange */
      padding: 20px;
    }

    table thead {
      background-color: orange; /* Warna orange */
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
  <div class="container-fluid">
    <?php require_once "./sidebar.php" ?>

    <div id="main-wrapper">
      <div class="main-content">
        <div class="row pt-3 pb-3 d-flex align-content-center text-center text-white rounded-4 bg-dark" style="height:100px;">
          <h2 class="align-middle">Data User</h2>
        </div>
        <table class="table">
          <thead style="height:75px;">
            <tr>
              <th class="align-middle" scope="col">ID</th>
              <th class="align-middle" scope="col">Username</th>
              <th class="align-middle" scope="col">Password</th>
              <th class="align-middle" scope="col">Nama</th>
              <th class="align-middle" scope="col">Role</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "koneksi.php";
            $qry = "SELECT id, username, password, nama, role from login";
            $exec = mysqli_query($con, $qry);

            while ($data = mysqli_fetch_assoc($exec)) {
            ?>
              <tr>
                <!-- <th scope="row"></th> -->
                <td class="align-middle"><?= $data['id'] ?></td>
                <td class="align-middle"><?= $data['username'] ?></td>
                <td class="align-middle"><?= $data['password'] ?></td>
                <td class="align-middle"><?= $data['nama'] ?></td>
                <td class="align-middle"><?= $data['role'] ?></td>
                <td>
                  <a class="btn btn-success" href="form_edit_mahasiswa.php?id=<?= $data['id'] ?>" role="button">Edit</a>
                  <a class="btn btn-danger" href="delete.php?id=<?= $data['id'] ?>" role="button">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <a class="btn btn-primary" href="form_mahasiswa.php" role="button">Tambah Data User</a>
      </div>
    </div>
  </div>
</body>

</html>
