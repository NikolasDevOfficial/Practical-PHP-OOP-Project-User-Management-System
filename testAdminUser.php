<?php use App\Security\Encryption;
use App\Models\Users\AdminUser;

session_start();

if (!isset($_SESSION["admin_created"])) {

    $_SESSION["users"][] = new AdminUser(
        new Encryption(),
        "Admin",
        "admin@email.com",
        "adminStrongPassword",
        uniqid()
    );

    $_SESSION["admin_created"] = true;
}