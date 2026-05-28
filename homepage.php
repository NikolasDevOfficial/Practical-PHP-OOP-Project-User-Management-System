<?php
error_reporting(E_ALL);

require_once __DIR__ . "/autoloader.php";

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
            <?= htmlspecialchars($_SESSION["user"]->getName())  ?>
        </span>

<a href="UsersProfilePage.php">Profile</a>

        <form method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>

    <?php else: ?>
      <p> <a href="registerPage.php"> Register</a>
        <a href="loginPage.php">Login</a>
    <?php endif; ?>

</header>

<h1>Welcome to the Administrative User Management system! </h1>

</body>
<footer> User Management System Project </footer>
</html>