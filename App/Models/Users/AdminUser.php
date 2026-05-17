<?php

namespace App\Models\Users;

use App\Models\Users\AbstractUser;
use App\Interfaces\AuthInterface;
use App\Traits\userActivityLogger;
class UserAdmin extends AbstractUser implements AuthInterface {
    use userActivityLogger;

    public function userRole(): string {
        return "Admin";
    }
    public function login($userEmail, $userPassword) {
        if ($userEmail === $this->userEmail && password_verify($userPassword, $this->userPassword))
         {
            $this->logUserActivity("Admin {$this->getName()} with ID {$this->getUserId()} logged in","INFO");
            return "Admin logged in successfully.";
        }
        $this->logUserActivity("Invalid attempt to log into {$this->getUserId()}","ERROR" );
        return "Unsuccessful login attempt.";
    }
    public function logout() {
        $this->logUserActivity( "Admin {$this->getName()} with ID {$this->getUserId()} logged out","INFO" );
        return "Admin logged out.";
    }
}

?>

