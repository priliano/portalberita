<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="row pt-3 pb-3 d-flex align-content-center text-center text-white rounded-4 bg-dark" style="height:100px;">
  <h2 class="align-middle">Data Images</h2>
</div>
<table class="table">
  <thead style="height:75px;">
    <tr>
      <th class="align-middle" scope="col">ID</th>
      <th class="align-middle" scope="col">Alt</th>
      <th class="align-middle" scope="col">URL</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    $qryImages = "SELECT id, alt, url FROM images";
    $execImages = mysqli_query($con, $qryImages);

    while ($imageData = mysqli_fetch_assoc($execImages)) {
    ?>
      <tr>
        <td class="align-middle"><?= $imageData['id'] ?></td>
        <td class="align-middle"><?= $imageData['alt'] ?></td>
        <td class="align-middle"><?= $imageData['url'] ?></td>
        <td>
          <a class="btn btn-success" href="edit_image.php?id=<?= $imageData['id'] ?>" role="button">Edit</a>
          <a class="btn btn-danger" href="delete_image.php?id=<?= $imageData['id'] ?>" role="button">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<a class="btn btn-primary" href="add_image.php" role="button">Add Image</a>
</body>
</html>