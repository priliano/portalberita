<?php include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $imageService->delete($_GET['id']);
} else {
    // Handle invalid request, redirect, or display a message
    die("Invalid request.");
}
