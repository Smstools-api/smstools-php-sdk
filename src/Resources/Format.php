<?php

namespace Smstools\Resources;

use Smstools\SmstoolsClient;

class Format
{
    public function __construct(
        protected SmstoolsClient $client
    ) {
    }

    /**
     * Format number
     */
    public function number(string $msisdn, string $countrycode): array
    {
        return $this->client->post('/format/number', [
            'number'        => $msisdn,
            'countrycode'   => $countrycode
        ]);
    }
}
