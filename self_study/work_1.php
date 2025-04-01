<?php

class ValidationException extends Exception {}

function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new ValidationException("Неверный формат email: $email");
    }
    print("Email корректен: $email<br>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    try {
        validateEmail($email);
    } catch (ValidationException $e) {
        print($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Проверка Email</title>
</head>
<body>
    <form method="post">
        <label for="email">Введите email:</label>
        <input type="text" id="email" name="email" required>
        <button type="submit">Проверить</button>
    </form>
</body>
</html>
