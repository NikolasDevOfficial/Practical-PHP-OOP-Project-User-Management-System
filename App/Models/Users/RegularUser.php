<?php
namespace App\Models\Users;

use App\Models\Users\AbstractUser;
use App\Interfaces\AuthInterface;
use App\Traits\userActivityLogger;
class UserRegular extends AbstractUser implements AuthInterface {
    use userActivityLogger;

    public function userRole(): string {
        return "User";
    }
    public function login($userEmail, $userPassword) {
        if ($userEmail === $this->userEmail && password_verify($userPassword, $this->userPassword)) {

  $this->logUserActivity("User {$this->getName()} - {$this->getUserId()} logged in", "INFO");
        return "The User logged in successfully.";
        }
        $this->logUserActivity("Invalid attempt to log into user {$this->getUserId()}", "ERROR");
        return "Unsuccessful login attempt.";
    }
    public function logout() {
        $this->logUserActivity("User {$this->getName()} - {$this->getUserId()} logged out", "INFO");
        return "User {$this->getName()} logged out.";
    }
}