<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  include "config.php";
  $qry = "DELETE FROM comment WHERE id = '$id'";
  $exec = mysqli_query($con, $qry);

  if ($exec) {
    echo "<script>alert('Data berhasil dihapus'); window.location = 'comment.php'</script>";
  } else {
    echo "Data gagal dihapus";
  }
}
