<?php
namespace App\Core;

abstract class AbstractUser {
    protected string $username;
    protected string $role;

    public function __construct(string $username, string $role) {
        $this->username = $username;
        $this->role = $role;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getRole(): string {
        return $this->role;
    }

    abstract public function getPermissions(): array;
}
