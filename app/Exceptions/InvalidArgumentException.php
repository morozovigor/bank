<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidArgumentException extends ApiException {
    public function __construct() {
        parent::__construct("invalid argument", Response::HTTP_BAD_REQUEST);
    }
}