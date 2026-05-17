<?php
namespace App\Core\Users;

interface AuthInterface {

public function login($userEmail,$userPassword);
public function logout();

}

?>