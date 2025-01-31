<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends Exception {
    protected int $statusCode;

    public function __construct(string $message, int $statusCode = Response::HTTP_BAD_REQUEST) {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): int {
        return $this->statusCode;
    }
}