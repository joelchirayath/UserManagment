<?php
require 'autoload.php';

use App\Services\AuthService;

$auth = new AuthService();
$auth->logout();
header("Location: index.php");
exit();
