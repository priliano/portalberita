<?php

if (isset($_GET['id'])) {
  $nim = $_GET['id'];

  include "koneksi.php";
  $qry = "DELETE FROM login WHERE id = '$id'";
  $exec = mysqli_query($con, $qry);

  if ($exec) {
    echo "<script>alert('Data berhasil dihapus'); window.location = 'index.php'</script>";
  } else {
    echo "Data gagal dihapus";
  }
}