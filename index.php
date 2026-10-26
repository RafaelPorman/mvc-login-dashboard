<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/app/models/User.php';
require_once __DIR__ . '/app/controllers/AuthController.php';

$controller = new AuthController(new User());
$controller->handle();
