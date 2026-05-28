<?php
require_once __DIR__ . "/autoloader.php";
require_once __DIR__ . "/database.php";

if (!isset($_SESSION["user"])) {
    header("Location: loginPage.php");
    exit;
}

$user = $_SESSION["user"];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([
    ":id" => $_SESSION["user"]
]);

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

$encryption = new \App\Security\Encryption();
$displayUsername = $encryption->decrypt($userData["username"]);
$displayEmail = $encryption->decrypt($userData["email"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="assets/usersProfilePageDesign.css">
</head>


<body>
<header id="userProfileHeaderTOP">

    <span>
    <?= htmlspecialchars($displayUsername)?>
    </span>

    <form method="POST" action="logout.php">
<button type="submit" style="display:inline-block; visibility:visible; background:gray;">Logout</button>
    </form>

</header>
<div id="userProfilePersonal">

    <main id="userProfileDetails">

        <h1 id="userProfileHeader">User Profile</h1>

        <div id="details">

         <p><strong>Role:</strong> <?= htmlspecialchars($userData["role"]) ?></p>
       <p><strong>Username:</strong> <?= htmlspecialchars($displayUsername) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($displayEmail) ?></p>

        </div>

    </main>

    <div id="promptList">
        <h1 id="promptUsersProfileHeader">List of Users</h1>

        <div id="promptListPage">
            Do you want to see whether people you know are on here as well?

            <a id="linkToList" href="listOfUserProfilesPage.php">Click here</a>
        </div>
    </div>

</div>

</body>

<footer>
User Management System Project
</footer>

</html>