<?php
require_once __DIR__ . "/autoloader.php";
require_once __DIR__ . "/database.php";


use App\Security\Encryption;
use App\Models\Users\RegularUser;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $userPassword = $_POST["password"];

$encryption = new Encryption();

    $user = new RegularUser(
        $encryption,
        $username,
        $email,
        $userPassword,
        bin2hex(random_bytes(16))
    );

   $_SESSION["user"] = $user->getUserId();

    $stmt = $pdo->prepare("
        INSERT INTO users (id, username, email, password, role)
        VALUES (:id, :username, :email, :password, :role)
    ");

    $stmt->execute([
        ":id" => $user->getUserId(),
        ":username" => $encryption -> encrypt($username),
        ":email" => $encryption -> encrypt($email),
        ":password" => password_hash($userPassword, PASSWORD_ARGON2I),
        ":role" => "User"
    ]);

    header("Location: homepage.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head >
      <link rel="stylesheet" href="assets\assets.css">
    <title>Login</title>
</head >

<body>

<header>User Management System</header>
<form id = "loginBox" method="POST">


<input id="username" type="text" name="username" placeholder="Enter username">

<input id="email" type="email" name="email" placeholder="Enter email">

<input id="password" type="password" name="password" placeholder="Enter password">

    <button id = "buttonSubmitLogin" type="submit">Register</button>
</p>

</form>

</body>

<footer>User Management System Project</footer>
</html>