<?php

require_once "init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_add'])) {
    $isSaved = $commentService->save($_POST['name'], $_POST['email'], $_POST['post_id'], $_POST['message']);
    if ($isSaved) {
        header("Location: details.php?id=" . $_POST['post_id']);
        exit();
    }
    // handle failure case here
}