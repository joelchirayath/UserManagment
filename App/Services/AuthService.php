<?php
namespace App\Services;

use App\Core\AuthInterface;
use App\Core\LoggerTrait;
use App\Models\Admin;
use App\Models\RegularUser;

class AuthService implements AuthInterface {
    use LoggerTrait;

    private array $users = [
        'admin' => ['password' => 'admin123', 'role' => 'admin'],
        'user'  => ['password' => 'user123', 'role' => 'user']
    ];

    public function login(string $username, string $password): bool {
        if (isset($this->users[$username]) && $this->users[$username]['password'] === $password) {
            session_start();
            $role = $this->users[$username]['role'];
            $user = $role === 'admin'
                ? new Admin($username, $role)
                : new RegularUser($username, $role);

            $_SESSION['user'] = serialize($user);
            $this->log("User $username logged in.");
            return true;
        }

        return false;
    }

    public function logout(): void {
        session_start();
        $user = $this->getCurrentUser()?->getUsername() ?? 'unknown';
        session_unset();
        session_destroy();
        $this->log("User $user logged out.");
    }

    public function isAuthenticated(): bool {
        session_start();
        return isset($_SESSION['user']);
    }

    public function getCurrentUser(): ?\App\Core\AbstractUser {
        session_start();
        return isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;
    }
}
