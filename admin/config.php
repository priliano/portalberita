<?php

require_once "../db/connection.php";
require_once "../db/user.php";
require_once "../db/image.php";
require_once "../db/post.php";
require_once "../config/logger.php";

$serverName = $_SERVER['SERVER_NAME'];
$serverPort = $_SERVER['SERVER_PORT'];
$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
$serverUrl = $protocol . $serverName . ':' . $serverPort;

$db = new Database();
$con = $db->con();

$userService = new User($con);
$postService = new Post($con);
$imageService = new Image($con, "../uploads/");
