<?php

namespace Daurensky\WinfreightPhpSdk\Client;

use Daurensky\WinfreightPhpSdk\Security\Authorization;
use GuzzleHttp\Client;

class BaseClient extends AbstractClient
{
    public function get(string $url, array $options)
    {
        return $this->sendRequest('GET', $url, $options);
    }

    public function post(string $url, array $options)
    {
        return $this->sendRequest('POST', $url, $options);
    }

    public function sendRequest(string $method, string $url, array $options)
    {
        $request = $this->client->createRequest($method, $url, $options);

        return $this->client->send($request);
    }
}