<?php

class ShopException extends Exception {}
class NotEnoughFundsException extends ShopException {}
class ItemNotAvailableException extends ShopException {}
class InvalidCartItemException extends ShopException {}
class PaymentProcessingException extends ShopException {}

try {
    throw new ItemNotAvailableException("Товар отсутствует на складе");
} catch (NotEnoughFundsException | ItemNotAvailableException | InvalidCartItemException | PaymentProcessingException $e) {
    print("Ошибка магазина: " . $e->getMessage());
} catch (ShopException $e) {
    print("Другая ошибка магазина: " . $e->getMessage());
}
