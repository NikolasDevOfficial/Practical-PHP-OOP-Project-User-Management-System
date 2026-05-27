<?php

namespace App\Services;


use App\Services\AuthResponse;
class AuthService {

    public function Authentication($user, $userEmail, $userPassword)
{
    if ($user->getEmail() !== $userEmail) {
        return ["status" => false, "message" => AuthResponse::InvalidEmail, 'ID' => $user-> getUserId()];
    }

    if (!$user->verifyPassword($userPassword)) {
        return ["status" => false, "message" => AuthResponse::InvalidPassword, 'ID' => $user-> getUserId()];
    }
    
    $user->logUserActivity(AuthResponse::LoginSuccess, "INFO");

    return [
        "status" => true,
        "message" => AuthResponse::LoginSuccess,
        "user" => $user-> getUserId()
    ];
    
}
public function logout($user)
{
    $user->logUserActivity(AuthResponse::LogoutSuccess, "INFO");

    return [
        "status" => true,
        "message" => AuthResponse::LogoutSuccess,
        "user" => $user->getUserId()
    ];
}
}