<?php

class RegistrationException extends Exception {}

function validateRegistration($email, $password) {
    if (empty($email) || empty($password)) {
        throw new RegistrationException("Обязательные поля не заполнены");
    }
    if (strlen($password) < 6) {
        throw new RegistrationException("Пароль слишком короткий (минимум 6 символов)");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new RegistrationException("Неверный формат email");
    }
    return "Регистрация успешна!";
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    try {
        $message = validateRegistration($email, $password);
    } catch (RegistrationException $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <form method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Зарегистрироваться</button>
    </form>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php elseif (isset($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</body>
</html>
