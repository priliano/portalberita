<?php

class User
{
    protected $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function list()
    {
        $qry = "SELECT * FROM login";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function findByUsername($username)
    {
        $qry = "SELECT * FROM login WHERE username = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function findById($id)
    {
        $qry = "SELECT * FROM login WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function save($username, $password, $nama, $role)
    {
        $qry = "INSERT INTO login (username, password, nama, role) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->con, $qry);
        if ($stmt === false) {
            echo "Failed to prepare statement";
            return;
        }

        mysqli_stmt_bind_param($stmt, 'ssss', $username, $password, $nama, $role);

        $exec = mysqli_stmt_execute($stmt);

        if ($exec) {
            echo "<script>alert('Data berhasil di simpan'); window.location = 'index.php';</script>";
        } else {
            echo "Data gagal di simpan";
        }
    }

    public function update($id, $username = null, $password = null, $nama = null, $role = null)
    {
        $qry = "SELECT * FROM login WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        $username = isset($username) ? $username : $user['username'];
        $password = isset($password) ? $password : $user['password'];
        $nama = isset($nama) ? $nama : $user['nama'];
        $role = isset($role) ? $role : $user['role'];

        $qry = "UPDATE login SET username = ?, password = ?, nama = ?, role = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'ssssi', $username, $password, $nama, $role, $id);
        $exec = mysqli_stmt_execute($stmt);

        if ($exec) {
            echo "<script>alert('Data berhasil di update'); window.location = 'index.php';</script>";
        } else {
            echo "Data gagal di update";
        }
    }

    public function delete($id)
    {
        $qry = "DELETE FROM login WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $exec = mysqli_stmt_execute($stmt);

        if ($exec) {
            echo "<script>alert('Data berhasil dihapus'); window.location = 'index.php';</script>";
        } else {
            echo "Data gagal dihapus";
        }
    }
}
