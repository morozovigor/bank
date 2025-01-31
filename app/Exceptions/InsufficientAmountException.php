<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InsufficientAmountException extends ApiException {
    public function __construct() {
        parent::__construct("insufficient amount", Response::HTTP_BAD_REQUEST);
    }
}