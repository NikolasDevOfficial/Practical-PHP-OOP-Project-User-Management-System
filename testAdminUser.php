<?php
require_once __DIR__ . "/autoloader.php";
require_once __DIR__ . "/database.php";


$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE role = 'Admin'");
$stmt->execute();
$encryption = new \App\Security\Encryption();
if ($stmt->fetchColumn() == 0) {

    $stmt = $pdo->prepare("
        INSERT INTO users (id, username, email, password, role)
        VALUES (:id, :username, :email, :password, :role)
    ");

    $stmt->execute([
        
        ":id" =>  bin2hex(random_bytes(16)),
        ":username" => $encryption->encrypt("Admin"),
        ":email" => $encryption->encrypt("admin@email.com"),
        ":password" => password_hash("adminStrongPassword", PASSWORD_ARGON2I),
        ":role" => "Admin"
    ]);
}