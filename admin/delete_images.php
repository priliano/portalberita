<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $imageId = $_GET['id'];

    // Delete image based on the ID
    $qryDeleteImage = "DELETE FROM images WHERE id = $imageId";
    $execDeleteImage = mysqli_query($con, $qryDeleteImage);

    if ($execDeleteImage) {
        // Redirect to the images page or display a success message
        header("Location: images.php");
        exit();
    } else {
        // Handle error, redirect, or display a message
        die("Failed to delete image.");
    }
} else {
    // Handle invalid request, redirect, or display a message
    die("Invalid request.");
}
?>
