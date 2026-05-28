<?php

require_once __DIR__ . "/autoloader.php";

if (!isset($_SESSION["user"])) {
    header("Location: loginPage.php");
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="assets/usersProfilePageDesign.css">
</head>

 <header id="userProfileHeaderTOP">
      
          <?php if (isset($_SESSION["user"])): ?>
        <span>
    
            <?= htmlspecialchars($_SESSION["user"]->getName()) ?>
        </span>

        <form method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>
        <?php else: ?>
        <a href="loginPage.php">Login</a>
    <?php endif; ?>
    </header>

<body>

<div id="userProfilePersonal">

    <main id="userProfileDetails">
        <h1 id = "userProfileHeader" >User Profile</h1>
<div id = "details" > 
<p><strong>Role:</strong> <?= htmlspecialchars($user->userRole()) ?></p>
<p><strong>Username:</strong> <?= htmlspecialchars($user->getName()) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user->getEmail()) ?></p>


        </div>

    </main>

    <div id = "promptList" >
    <h1 id = "promptUsersProfileHeader" >List of Users</h1>

<div id = "promptListPage" >Do you want to see whether people you know are on here as well? 

<a id = linkToList href="listOfUserProfilesPage.php">Click here</a>
</div>
</div>
</div>

</body>
<footer>
User Management System Project
    </footer>

</html>