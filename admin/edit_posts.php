<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Fetch post data based on the ID
    $qryEditPost = "SELECT id, title, image_id, author_id, category, isi FROM posts WHERE id = $postId";
    $execEditPost = mysqli_query($con, $qryEditPost);

    if ($execEditPost && mysqli_num_rows($execEditPost) > 0) {
        $postData = mysqli_fetch_assoc($execEditPost);
    } else {
        // Handle error, redirect, or display a message
        die("Post not found.");
    }
} else {
    // Handle invalid request, redirect, or display a message
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include necessary head elements -->
    <!-- ... -->
</head>

<body>
    <div class="container-fluid">
        <?php require_once "./sidebar.php" ?>

        <div id="main-wrapper">
            <div class="main-content">
                <!-- Display the post data in a form for editing -->
                <h2>Edit Post</h2>
                <form method="post" action="update_post.php">
                    <input type="hidden" name="id" value="<?= $postData['id'] ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $postData['title'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_id" class="form-label">Image ID</label>
                        <input type="text" class="form-control" id="image_id" name="image_id" value="<?= $postData['image_id'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author ID</label>
                        <input type="text" class="form-control" id="author_id" name="author_id" value="<?= $postData['author_id'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="<?= $postData['category'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Content</label>
                        <textarea class="form-control" id="isi" name="isi" rows="5" required><?= $postData['isi'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
