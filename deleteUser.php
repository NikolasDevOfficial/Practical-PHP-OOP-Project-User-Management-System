<?php
require_once __DIR__ . "/autoloader.php";
require_once __DIR__ . "/database.php";

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([
    ":id" => $_SESSION["user"]
]);

$currentUser = $stmt->fetch(PDO::FETCH_ASSOC);

if ($currentUser["role"] !== "Admin")  {{
    header("Location: AccessDenied.php");
    exit;
}}

$stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
$stmt->execute([
    ":id" => $_POST["userId"]
]);

header("Location: listOfUserProfilesPage.php");
exit;