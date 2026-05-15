<?php
// <!-- Step 1. Define the abstract class (AbstractUser) > common user properties and methods
//abstract class; done 
// hash passwords, find a newer method; done
// encrypt usernames and emails; done 
namespace App\Core;

abstract class AbstractUser {
    protected $userName;
    protected $userEmail;
    protected $userPassword;

    public function __construct($userName, $userEmail, $userPassword) {

        $encryption = new Encryption();

        $this->userName = $encryption->encrypt($userName);
        $this->userEmail = $encryption->encrypt($userEmail);
        $this->userPassword = password_hash($userPassword, PASSWORD_ARGON2I);
    }

    public function getName() {

        $encryption = new Encryption();
        return $encryption->decrypt($this->userName);
    }

    public function getEmail() {
        
        $encryption = new Encryption();
        return $encryption->decrypt($this->userEmail);
    }

    abstract public function userRole();
}
?>