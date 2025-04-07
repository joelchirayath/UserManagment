<?php
require_once 'autoload.php';

use App\Services\AuthService;

$auth = new AuthService();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<h2>Login</h2>
<form method="post">
    <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
