<?php

namespace App\Models\Users;

use App\Models\Users\AbstractUser;
use App\Interfaces\AuthInterface;
use App\Traits\UserActivityLogger;

class AdminUser extends AbstractUser implements AuthInterface {

    use UserActivityLogger;

    public function userRole(): string {
        return "Admin";
    }

    public function login($userEmail, $userPassword) {
        return true;
    }

    public function logout() {
        return true;
    }
}

?>