<?php

namespace Smstools\Resources;

use Smstools\SmstoolsClient;

class Sms
{
    public function __construct(
        protected SmstoolsClient $client
    ) {
    }

    /**
     * Send message
     *
     * Example payload:
     * {
     *  "to": "3247....",
     *  "message": "Hallo",
     *  "sender": "Smstools"
     * }
     */
    public function send(string $to, string $message, ?string $sender = null, array $extra = []): array
    {
        $payload = array_merge([
            'to' => $to,
            'message' => $message,
            'sender' => $sender
        ], $extra);

        return $this->client->post('/message/send', $payload);
    }

}
