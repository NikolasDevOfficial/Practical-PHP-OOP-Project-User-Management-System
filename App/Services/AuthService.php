<?php

namespace App\Services;

use App\Services\AuthResponse;
class AuthService {
private $pdo;
public function __construct($pdo)
{
    $this->pdo = $pdo;
}

    public function Authentication($userEmail, $userPassword)
{
    require_once __DIR__ . "/../../database.php";

    $stmt = $this->pdo->prepare("
        SELECT * FROM users WHERE email = :email
    ");

    $stmt->execute([
        ":email" => $userEmail
    ]);

    $dbUser = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$dbUser) {
        return [
            "status" => false,
            "message" => AuthResponse::InvalidEmail
        ];
    }

    if (!password_verify($userPassword, $dbUser["password"])) {
        return [
            "status" => false,
            "message" => AuthResponse::InvalidPassword,
            "ID" => $dbUser["id"]
        ];
    }
    error_log("DEBUG: INFO | User {$dbUser["id"]} | LOG: Login Success");

    return [
        "status" => true,
        "message" => AuthResponse::LoginSuccess,
        "user" => $dbUser["id"]
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