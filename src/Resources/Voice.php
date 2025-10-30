<?php

namespace Smstools\Resources;

use Smstools\SmstoolsClient;

class Voice
{
    public function __construct(
        protected SmstoolsClient $client
    ) {
    }

    /**
     * Send voice message
     *
     * Example payload:
     * {
     *  "to": "3247....",
     *  "message": "Hello world",
     * }
     */
    public function send(string $to, string $message, array $extra = []): array
    {
        $payload = array_merge([
            'to'      => $to,
            'message' => $message,
        ], $extra);

        return $this->client->post('/voice/send', $payload);
    }
}
