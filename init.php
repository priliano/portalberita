<?php

require_once "./db/connection.php";
require_once "./db/image.php";
require_once "./db/post.php";
require_once "./db/comment.php";
require_once "./config/logger.php";

$DB = new Database();
if ($DB->checkHealth()) {
     Logger::info("connected to database");
}

$postService = new Post($DB->con());
$commentService = new Comment($DB->con());
