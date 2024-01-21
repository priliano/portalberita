<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Delete post based on the ID
    $qryDeletePost = "DELETE FROM posts WHERE id = $postId";
    $execDeletePost = mysqli_query($con, $qryDeletePost);

    if ($execDeletePost) {
        // Redirect to the posts page or display a success message
        header("Location: posts.php");
        exit();
    } else {
        // Handle error, redirect, or display a message
        die("Failed to delete post.");
    }
} else {
    // Handle invalid request, redirect, or display a message
    die("Invalid request.");
}
?>
