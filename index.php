<?php declare(strict_types=1);
error_reporting(E_ALL);
 
define('ROOT_DIR', __DIR__);

use Engine\Core\Database\Connection;
 
require __DIR__ . '/engine/bootstrap.php';

$config = require_once  __DIR__ . '/engine/Config/config.php';
