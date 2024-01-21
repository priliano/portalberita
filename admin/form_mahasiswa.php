<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <div class="row pt-3 pb-3 text-center">
      <h1>Formulir</h1>
    </div>
    <form action="proses.php" method="POST">
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
</body>