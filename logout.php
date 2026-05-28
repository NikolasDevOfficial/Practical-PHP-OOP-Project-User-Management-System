<?php
require_once __DIR__ . "/autoloader.php";


unset($_SESSION["user"]);

header("Location: homepage.php");
exit;