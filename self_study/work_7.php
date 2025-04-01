<?php

try {
    throw new RuntimeException("Ошибка выполнения");
} catch (InvalidArgumentException | RuntimeException $e) {
    print($e->getMessage());
}