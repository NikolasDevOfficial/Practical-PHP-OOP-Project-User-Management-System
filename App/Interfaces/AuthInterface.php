<?php
namespace App\Interfaces;

interface AuthInterface {

public function login($userEmail,$userPassword);
public function logout();

}

?>