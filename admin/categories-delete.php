<?php
if (isset($_GET['id'])) {
  $idcategory = $_GET['id'];

  include "config.php";
  $qry = "DELETE FROM categories WHERE id = '$idcategory'";
  $exec = mysqli_query($con, $qry);

  if ($exec) {
    echo "<script>alert('Data berhasil dihapus'); window.location = 'category.php'</script>";
  } else {
    echo "Data gagal dihapus";
  }
}
