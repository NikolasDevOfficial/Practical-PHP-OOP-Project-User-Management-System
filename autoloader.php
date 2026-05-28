<?php
require_once __DIR__ . "/autoload.php";
require_once __DIR__ . "/testAdminUser.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["console_log"])) {
    echo "<script>console.log(" . json_encode($_SESSION["console_log"]) . ");</script>";
    unset($_SESSION["console_log"]);
}
