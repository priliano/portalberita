<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $postId = $_POST['id'];
    $title = $_POST['title'];
    $imageId = $_POST['image_id'];
    $authorId = $_POST['author_id'];
    $category = $_POST['category'];
    $isi = $_POST['isi'];

    // Update post based on the ID
    $qryUpdatePost = "UPDATE posts SET title='$title', image_id='$imageId', author_id='$authorId', category='$category', isi='$isi' WHERE id=$postId";
    $execUpdatePost = mysqli_query($con, $qryUpdatePost);

    if ($execUpdatePost) {
