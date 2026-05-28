<?php
require_once __DIR__ . "/autoloader.php";
require_once __DIR__ . "/database.php";

if (!isset($_SESSION["user"])) {
    header("Location: AccessDenied.php");
    exit;
}


$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([
    ":id" => $_SESSION["user"]
]);

$currentUser = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$currentUser) {
    session_destroy();
    header("Location: loginPage.php");
    exit;
}

$isAdmin = ($currentUser["role"] === "Admin");


$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <?= htmlspecialchars($encryption->decrypt($currentUser["username"])) ?>
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

            <?php 
            use App\Security\Encryption;
            $encryption = new Encryption();
            foreach ($users as $user): ?>

                <div class="userRow">

                    <?= htmlspecialchars($encryption->decrypt($user["username"])) ?>

                    <?php if ($isAdmin): ?>
                        <form method="POST" action="deleteUser.php">
                            <input type="hidden" name="userId" value="<?= $user["id"] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>

    </main>

</div>

</body>

<footer>
    User Management System Project
</footer>

</html>