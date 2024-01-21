<?php
if (isset($_GET['id_category'])) {
  $idcategory = $_GET['id_category'];

  include "koneksi.php";
  $qry = "DELETE FROM category WHERE id_category = '$idcategory'";
  $exec = mysqli_query($con, $qry);

  if ($exec) {
    echo "<script>alert('Data berhasil dihapus'); window.location = 'category.php'</script>";
  } else {
    echo "Data gagal dihapus";
  }
}