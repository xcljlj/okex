<?php

namespace OkexV3\src\exception;


use Throwable;

class OkCoinException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}