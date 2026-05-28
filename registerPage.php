<?php
require_once __DIR__ . "/autoloader.php";


use App\Security\Encryption;
use App\Models\Users\RegularUser;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_SESSION["users"])) {
        $_SESSION["users"] = [];
    }

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $user = new RegularUser(
        new Encryption(),
        $username,
        $email,
        $password,
        uniqid()
    );

$_SESSION["user"] = $user;
$_SESSION["users"][] = $user;

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

    <input id = "username" type="text" name="username" placeholder="Username">
    <input id = "email" type="email" name="email" placeholder="Email">
    <input id = "password" type="password" name="password" placeholder="Password">

    <button id = "buttonSubmitLogin" type="submit">Register</button>
</p>

</form>

</body>

<footer>User Management System Project</footer>
</html>