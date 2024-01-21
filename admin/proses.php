<?php

if (isset($_POST['submit_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];

    include "koneksi.php";

    $qry = "INSERT INTO login (username, password, nama, role) VALUES (
        '$username', '$password', '$nama', '$role'
    )";

    $exec = mysqli_query($con, $qry);

    if ($exec) {
        echo "<script>alert('Data berhasil di simpan'); window.location = 'index.php';</script>";
    } else {
        echo "Data gagal di simpan";
    }
}
