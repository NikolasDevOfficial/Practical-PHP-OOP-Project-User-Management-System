<?php
error_reporting(E_ALL);

require_once __DIR__ . "/autoloader.php";

if (!isset($_SESSION["user"])) {
    header("Location: loginPage.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([
    ":id" => $_SESSION["user"]
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    session_destroy();
    header("Location: loginPage.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/assets.css">
    <title>Homepage</title>
</head>

<body>

<header>

    User Management System

    <?php if (isset($_SESSION["user"])): ?>
        <span>
            | Logged in as:
    <?= htmlspecialchars((new \App\Security\Encryption())->decrypt($user["username"])) ?>
        </span>

        <a href="UsersProfilePage.php">Profile</a>

        <form method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>

    <?php else: ?>
        <a href="registerPage.php">Register</a>
        <a href="loginPage.php">Login</a>
    <?php endif; ?>

</header>

<h1>Welcome to the Administrative User Management System!</h1>

</body>

<footer>
    User Management System Project
</footer>

</html>