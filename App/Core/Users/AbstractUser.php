<?php
// <!-- Step 1. Define the abstract class (AbstractUser) > common user properties and methods
//abstract class; done 
// hash passwords, find a newer method; done
// encrypt usernames and emails; done 
namespace App\Core;

abstract class AbstractUser  {
    protected $userName;
    protected $userEmail;
    protected $userPassword;
    protected $userId;
    protected $userRole;

    protected Encryption $encryption;

    public function __construct(Encryption $encryption, $userName, $userEmail, $userPassword, $userId) {

    $this->encryption=$encryption;
    
        $this->userName = $encryption->encrypt($userName);
        $this->userEmail = $encryption->encrypt($userEmail);
        $this->userPassword = password_hash($userPassword, PASSWORD_ARGON2I);
        $this-> userId = $encryption->encrypt($userId);
    }

    public function getName() {

        return $this->encryption->decrypt($this->userName);
    }

    public function getEmail() {
        
        return $this->encryption->decrypt($this->userEmail);
    }
   public function getUserId(): int {
        return $this->encryption->decrypt($this->userId);
    }

    abstract public function userRole(): string;


}
?>