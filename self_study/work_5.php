<?php

function logException(Throwable $exception) {
    file_put_contents("error.log", $exception->getMessage() . "\n", FILE_APPEND);
}

try {
    throw new Exception("Ошибка логирования");
} catch (Exception $e) {
    logException($e);
}