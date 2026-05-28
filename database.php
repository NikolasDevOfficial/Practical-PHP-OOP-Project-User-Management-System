<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=main_database;charset=utf8mb4",
        "root",
        ""
    );

} catch (PDOException $e) {
    echo $e->getMessage();
}