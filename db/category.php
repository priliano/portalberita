<?php

class Category
{
    protected $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function list()
    {
        $qry = "SELECT * FROM categories";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function findById($id)
    {
        $qry = "SELECT * FROM categories WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function save($name)
    {
        $qry = "INSERT INTO categories (name) VALUES (?)";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 's', $name);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $name)
    {
        $qry = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'si', $name, $id);
        return mysqli_stmt_execute($stmt);
    }

    public function delete($id)
    {
        $qry = "DELETE FROM categories WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return mysqli_stmt_execute($stmt);
    }
}
