<?php

class DatabaseConnectionException extends Exception {}

function connectToDatabase($dsn, $user, $password) {
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print("✅ Подключение к базе данных успешно!<br>");
        return $pdo;
    } catch (PDOException $e) {
        throw new DatabaseConnectionException("Ошибка подключения к базе данных: " . $e->getMessage());
    }
}

try {
    $pdo = connectToDatabase("mysql:host=localhost;dbname=test", "root", ""); 
} catch (DatabaseConnectionException $e) {
    print("❌ " . $e->getMessage());
}

?>
