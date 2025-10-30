<?php

namespace Smstools\Exceptions;

class HttpException extends SmstoolsException
{
    public function __construct(
        string $message,
        public int $statusCode = 0,
        public ?array $response = null
    ) {
        parent::__construct($message, $statusCode);
    }
}
