<?php
require 'autoload.php';

use App\Services\AuthService;

$auth = new AuthService();

if (!$auth->isAuthenticated()) {
    header("Location: index.php");
    exit();
}

$user = $auth->getCurrentUser();
?>

<h2>Dashboard</h2>
<p>Welcome, <?= htmlspecialchars($user->getUsername()) ?>!</p>
<p>Your Role: <?= htmlspecialchars($user->getRole()) ?></p>
<p>Permissions: <?= implode(', ', $user->getPermissions()) ?></p>
<a href="logout.php">Logout</a>
