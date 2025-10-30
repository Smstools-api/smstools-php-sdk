<?php

namespace Smstools\Resources;

use Smstools\SmstoolsClient;

class SenderIds
{
    public function __construct(
        protected SmstoolsClient $client
    ) {
    }

    public function get(): array
    {
        return $this->client->get('/senderids');
    }
}
