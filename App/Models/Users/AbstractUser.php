<?php
// <!-- Step 1. Define the abstract class (AbstractUser) > common user properties and methods
//abstract class; done 
// hash passwords, find a newer method; done
// encrypt usernames and emails; done 
//auth service: done

namespace App\Models\Users;

use App\Security\Encryption;

abstract class AbstractUser  {
    protected $userName;
    protected $userEmail;
    protected $userPassword;
    protected $userId;
    protected $userRole;

    protected Encryption $encryption;
    public function __construct(Encryption $encryption, $userName, $userEmail, $userPassword, $userId) {

   $this->userId = $userId;
    $this->encryption=$encryption;   
       $this->userName = $encryption->encrypt($userName);
       $this->userEmail = $encryption->encrypt($userEmail);
        $this->userPassword = password_hash($userPassword, PASSWORD_ARGON2I);
    }

    public function getName() {

        return $this->encryption->decrypt($this->userName);
    }

    public function getEmail() {
        
        return $this->encryption->decrypt($this->userEmail);
    }
    public function verifyPassword($userPassword): bool {
    return password_verify($userPassword, $this->userPassword);
}
   public function getUserId() {
        return $this->userId;
    }
    abstract public function userRole(): string;
}