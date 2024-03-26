<?php

namespace App\Exceptions;

use Exception;

class BusinessException extends Exception
{
    protected $message;

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message ?: 'Business exception occurred.';
    }

    public function render($request)
    {
        return response()->json([
            'error' => $this->message,
        ], 400);
    }
}
