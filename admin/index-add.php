<?php require_once "config.php";

if (isset($_POST['submit_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $role = $_POST['role'];

  $userService->save($username, $password, $nama, $role);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
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
        <form method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="mb-3">
            <div class="mb-3">
              <label for="name" class="form-label">Password</label>
              <input type="text" class="form-control" name="password">
            </div>
            <div class="mb-3">
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="mb-3">
                <label for="role">Role</label>
                <select class="form-select" name="role" aria-label="role">
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
              </div>
              <button type="submit" name="submit_user" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>