<?php

require_once "./db/connection.php";
require_once "./db/image.php";
require_once "./config/logger.php";

$DB = new Database();
if ($DB->checkHealth()) {
     Logger::info("connected to database");
}
