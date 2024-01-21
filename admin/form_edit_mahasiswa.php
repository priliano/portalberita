<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php
  $nim = $_GET['id'];
  include "koneksi.php";

  $qry = "SELECT * FROM login WHERE id = 'id'";
  $exec = mysqli_query($con, $qry);
  $data = mysqli_fetch_assoc($exec);
  ?>
  <div class="container mt-4">
    <div class="row pt-3 pb-3 text-center">
      <h1>Form Edit Data User</h1>
    </div>
    <form action="update.php" method="POST">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="number" class="form-control" name="id" value="<?= $data['id'] ?>" style="color:rgba(0, 0, 0, 0.4)" readonly>
        <div class="form-text">Data ID User/Admin Tidak Dapat Dirubah</div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" value="<?= $data['password'] ?>">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
      </div>
      <div class="mb-3">
        <label for="jurusan">Role</label>
        <select class="form-select" name="role" aria-label="select-role">
          <option value="admin" <?= ($data['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= ($data['role'] === 'user') ? 'selected' : '' ?>>User</option>
        </select>
      </div>
      <button type="submit" name="update_user" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</body>