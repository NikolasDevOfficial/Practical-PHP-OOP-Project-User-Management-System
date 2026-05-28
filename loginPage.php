<?php

ini_set('display_errors', 1);

require_once __DIR__ . "/autoloader.php";
require_once __DIR__ . "/database.php";

use App\Services\AuthService;



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $auth = new AuthService($pdo);

    $result = $auth->Authentication(
        $_POST["email"],
        $_POST["password"]
    );

    if ($result["status"]) {

        $_SESSION["user"] = $result["user"];
        header("Location: homepage.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html>
<head >
      <link rel="stylesheet" href="assets\assets.css">
    <title>Login</title>
</head >
<body>
 <header>

         User Management System

    <?php if (isset($_SESSION["user"])): ?>
        <span>
            | Logged in as: 
         <?= htmlspecialchars($_SESSION["user"]->getName()) ?>
        </span>


        <form method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>


    <?php else: ?>
        <a href="loginPage.php">Login</a>
    <?php endif; ?>


<!-- </pre> -->
</header>

<form id = "loginBox" method="POST">
    <input id = "email" type="email" name="email" placeholder="Email">
    <input id = "password" type="password" name="password" placeholder="Password">
    <button id = "buttonSubmitLogin" type="submit">Login</button>
    
    <p> <a href="registerPage.php"> Don't have an account? Click here!</a>
</p>

</form>

</body>
<footer>User Management System Project</footer>


</html>