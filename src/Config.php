<?php

namespace Smstools;

class Config
{
    public function __construct(
        public string $clientId,
        public string $clientSecret,
        public string $baseUrl = 'https://api.smstools.com/v1/'
    ) {
    }
}
