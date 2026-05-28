<?php
require_once __DIR__ . "/autoloader.php";

if (!isset($_SESSION["user"])) {
    header("Location: AccessDenied.php");
    exit;
}

$currentUser = $_SESSION["user"];
$isAdmin = ($currentUser->userRole() === "Admin");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Users</title>
    <link rel="stylesheet" href="assets/usersProfilePageDesign.css">
</head>

<header id="userProfileHeaderTOP">
    User Management System TM

    <?php if (isset($_SESSION["user"])): ?>
        <span id="userNameList">
            <?= htmlspecialchars($currentUser->getName()) ?>
        </span>

        <form id="logoutUserList" method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>
    <?php else: ?>
        <a href="loginPage.php">Login</a>
    <?php endif; ?>
</header>

<body>

<div id="userProfilePersonal">

    <main id="userProfileDetails">
        <h1 id="userProfileHeader">List of Users</h1>

        <div id="listDesign">

           <?php foreach ($_SESSION["users"] ?? [] as $index => $user): ?>

    <?php if (is_object($user) && method_exists($user, "getName")): ?>
        <div class="userRow">

            <?= htmlspecialchars($user->getName()) ?>

            <?php if ($isAdmin): ?>
                <form method="POST" action="deleteUser.php">
                       <input type="hidden" name="userId" value="<?= $user->getUserId() ?>">
                    <button type="submit">Delete</button>
                </form>
            <?php endif; ?>

        </div>
    <?php endif; ?>

<?php endforeach; ?>
        </div>

    </main>

</div>

</body>

<footer> User Management System Project </footer>

</html>