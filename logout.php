<?php
require_once __DIR__ . "/autoloader.php";


unset($_SESSION["user"]);
session_destroy();

header("Location: homepage.php");
exit;