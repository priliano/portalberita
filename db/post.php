<?php

class Post
{
    protected $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function list()
    {
        $qry = "SELECT * FROM posts";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function listWithImage()
    {
        $qry = "SELECT p.id, p.title, p.author_id, p.category, p.content, i.url, i.alt, c.nama as category_name  FROM posts p LEFT JOIN images i ON p.image_id = i.id LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function findById($id)
    {
        $qry = "SELECT p.id, p.title, p.author_id, p.category, p.content, i.url, i.alt, a.username AS author_name, c.nama AS category_name FROM posts p LEFT JOIN images i ON p.image_id = i.id LEFT JOIN login a ON p.author_id = a.id LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function save($title, $image_id, $author_id, $category, $content)
    {
        $qry = "INSERT INTO posts (title, image_id, author_id, category, content) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'siiis', $title, $image_id, $author_id, $category, $content);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $title, $image_id, $author_id, $category, $content)
    {
        $qry = "UPDATE posts SET title = ?, image_id = ?, author_id = ?, category = ?, content = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'siiisi', $title, $image_id, $author_id, $category, $content, $id);
        return mysqli_stmt_execute($stmt);
    }

    public function delete($id)
    {
        $qry = "DELETE FROM posts WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return mysqli_stmt_execute($stmt);
    }
}
