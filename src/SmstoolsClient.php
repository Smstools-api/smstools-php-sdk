<?php

namespace Smstools;

use Smstools\Exceptions\HttpException;

class SmstoolsClient
{
    public function __construct(
        protected Config $config
    ) {
    }

    /**
     * POST request
     */
    public function post(string $path, array $payload = []): array
    {
        $url = rtrim($this->config->baseUrl, '/') . '/' . ltrim($path, '/');

        $ch = curl_init($url);
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-Client-Id: ' . $this->config->clientId,
            'X-Client-Secret: ' . $this->config->clientSecret,
        ];

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_TIMEOUT => 15,
        ]);

        $raw = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($raw === false) {
            $err = curl_error($ch);
            curl_close($ch);
            throw new HttpException('cURL error: ' . $err, 0, null);
        }

        curl_close($ch);
        $data = json_decode($raw, true);

        if ($httpCode >= 400) {
            throw new HttpException('HTTP error from smstools: ' . $httpCode, $httpCode, $data);
        }

        return $data ?? [];
    }

    /**
     * GET request
     */
    public function get(string $path, array $query = []): array
    {
        $url = rtrim($this->config->baseUrl, '/') . '/' . ltrim($path, '/');

        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        $ch = curl_init($url);
        $headers = [
            'Accept: application/json',
            'X-Client-Id: ' . $this->config->clientId,
            'X-Client-Secret: ' . $this->config->clientSecret,
        ];

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 15,
        ]);

        $raw = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($raw === false) {
            $err = curl_error($ch);
            curl_close($ch);
            throw new HttpException('cURL error: ' . $err, 0, null);
        }

        curl_close($ch);
        $data = json_decode($raw, true);

        if ($httpCode >= 400) {
            throw new HttpException('HTTP error from smstools: ' . $httpCode, $httpCode, $data);
        }

        return $data ?? [];
    }
}
