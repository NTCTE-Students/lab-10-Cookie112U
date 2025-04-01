<?php

function divide($a, $b) {
    if ($b == 0) {
        throw new DivisionByZeroError("Деление на ноль невозможно");
    }
    return $a / $b;
}

try {
    print(divide(10, 0));
} catch (DivisionByZeroError $e) {
    print($e->getMessage());
}