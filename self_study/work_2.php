<?php

class FileReadException extends Exception {}

function readFileContent($filename) {
    if (!file_exists($filename)) {
        throw new FileReadException("Файл не найден: $filename");
    }
    if (!is_readable($filename)) {
        throw new FileReadException("Нет прав на чтение файла: $filename");
    }

    $content = file_get_contents($filename);
    if ($content === false) {
        throw new FileReadException("Ошибка при чтении файла: $filename");
    }

    return $content;
}
function logException(Throwable $exception) {
    file_put_contents("error.log", "[" . date("Y-m-d H:i:s") . "] " . $exception->getMessage() . "\n", FILE_APPEND);
}
try {
    $filename = "nonexistent.txt";
    if (file_exists($filename)) {
        print("✅ Файл найден: $filename\n");

        $content = readFileContent($filename);
        if (strlen(trim($content)) > 0) {
            print("📄 Содержимое файла:\n$content");
        } else {
            print("⚠️ Файл пуст");
        }
    } else {
        print("❌ Файл отсутствует: $filename");
    }
} catch (FileReadException | RuntimeException $e) {
    logException($e);
    print("❌ Ошибка: " . $e->getMessage());
}

?>
