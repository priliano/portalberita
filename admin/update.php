<?php

if (isset($_POST['update_login'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];

    include "koneksi.php";

    $qry = "UPDATE login SET username = '$username', password = '$password', nama = '$nama', role = '$role' WHERE id = '$id'";

    $exec = mysqli_query($con, $qry);

    if ($exec) {
        echo "<script>alert('Data berhasil di update'); window.location = 'index.php';</script>";
    } else {
        echo "Data gagal di simpan";
    }
}
