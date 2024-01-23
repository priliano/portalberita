<?php

class Comment
{
    protected $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function list()
    {
        $qry = "SELECT * FROM comments";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function findById($id)
    {
        $qry = "SELECT * FROM comments WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function findByPostId($id)
    {
        $qry = "SELECT * FROM comments WHERE post_id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function save($name, $email, $post_id, $message)
    {
        $qry = "INSERT INTO comments (name, email, post_id, message) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'ssis', $name, $email, $post_id, $message);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $name, $email, $post_id, $message)
    {
        $qry = "UPDATE comments SET name = ?, email = ?, post_id = ?, message = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'ssisi', $name, $email, $post_id, $message, $id);
        return mysqli_stmt_execute($stmt);
    }
}
