<?php
namespace App\Models;

use App\Core\AbstractUser;

class Admin extends AbstractUser {
    public function getPermissions(): array {
        return ['create', 'edit', 'delete', 'view'];
    }
}
