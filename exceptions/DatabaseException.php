<?php

class DatabaseConnectionException extends Exception {
    public function __construct($message = "Ошибка подключения к базе данных", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

?>
