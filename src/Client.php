<?php

namespace Smstools;

use Smstools\Resources\Sms;
use Smstools\Resources\Voice;
use Smstools\Resources\Balance;
use Smstools\Resources\Format;
use Smstools\Resources\SenderIds;
use Smstools\Resources\Webhooks;

class Client
{
    protected SmstoolsClient $http;

    public function __construct(string $clientId, string $clientSecret, string $baseUrl = 'https://api.smstools.com/v1/')
    {
        $this->http = new SmstoolsClient(new Config($clientId, $clientSecret, $baseUrl));
    }

    public function sms(): Sms
    {
        return new Sms($this->http);
    }

    public function voice(): Voice
    {
        return new Voice($this->http);
    }

    public function balance(): Balance
    {
        return new Balance($this->http);
    }

    public function senderIds(): SenderIds
    {
        return new SenderIds($this->http);
    }

    public function format(): Format
    {
        return new Format($this->http);
    }


    /**
     * Direct access to HTTP-client for custom endpoints.
     */
    public function raw(): SmstoolsClient
    {
        return $this->http;
    }
}
