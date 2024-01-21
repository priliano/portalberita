<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $imageId = $_GET['id'];

    // Fetch image data based on the ID
    $qryEditImage = "SELECT id, alt, url FROM images WHERE id = $imageId";
    $execEditImage = mysqli_query($con, $qryEditImage);

    if ($execEditImage && mysqli_num_rows($execEditImage) > 0) {
        $imageData = mysqli_fetch_assoc($execEditImage);
    } else {
        // Handle error, redirect, or display a message
        die("Image not found.");
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
                <!-- Display the image data in a form for editing -->
                <h2>Edit Image</h2>
                <form method="post" action="update_image.php">
                    <input type="hidden" name="id" value="<?= $imageData['id'] ?>">
                    <div class="mb-3">
                        <label for="alt" class="form-label">Alt Text</label>
                        <input type="text" class="form-control" id="alt" name="alt" value="<?= $imageData['alt'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= $imageData['url'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Image</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
