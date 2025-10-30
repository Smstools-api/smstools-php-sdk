<?php

namespace Smstools\Resources;

use Smstools\SmstoolsClient;

class Balance
{
    public function __construct(
        protected SmstoolsClient $client
    ) {
    }

    public function get(): array
    {
        return $this->client->get('/balance');
    }
}
