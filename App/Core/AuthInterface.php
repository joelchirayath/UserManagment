<?php
namespace App\Core;

interface AuthInterface {
    public function login(string $username, string $password): bool;
    public function logout(): void;
    public function isAuthenticated(): bool;
}
