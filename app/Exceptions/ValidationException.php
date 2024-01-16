<?php

namespace App\Exceptions;

class ValidationException extends \Exception
{
    private string $field;

    public function __construct(string $message = "", string $field = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->field = $field;
    }

    /**
     * @return mixed
     */
    public function getField() : string
    {
        return $this->field;
    }
}
