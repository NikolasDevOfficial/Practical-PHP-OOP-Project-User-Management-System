<?php

require_once __DIR__ . "/autoloader.php";

if ($_SESSION["user"]->userRole() !== "Admin") {
    header("Location: accessDenied.php");
    exit;
}

if (!isset($_POST["userId"])) {
    header("Location: listOfUserProfilesPage.php");
    exit;
}

$userId = $_POST["userId"];

foreach ($_SESSION["users"] as $key => $user) {

    if ($user->getUserId() === $_POST["userId"]) {
        unset($_SESSION["users"][$key]);
        break;
    }
}

$_SESSION["users"] = array_values($_SESSION["users"]);

header("Location: listOfUserProfilesPage.php");
exit;