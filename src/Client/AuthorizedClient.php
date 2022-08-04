<?php

namespace Daurensky\WinfreightPhpSdk\Client;

use Daurensky\WinfreightPhpSdk\Security\Authorization;

class AuthorizedClient extends AbstractClient
{
    /** @var Authorization */
    protected $authorization;

    public function __construct(Authorization $authorization)
    {
        parent::__construct();

        $this->authorization = $authorization;
    }

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
        $request->setHeader('Authorization', "Bearer {$this->authorization->getAccessToken()}");

        return $this->client->send($request);
    }
}