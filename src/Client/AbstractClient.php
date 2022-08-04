<?php

namespace Daurensky\WinfreightPhpSdk\Client;

use GuzzleHttp\Client;

abstract class AbstractClient
{
    const BASE_URL = 'https://cloudplatform.iconnix.co.za/Winfreight_API/';

    /** @var Client */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_url' => self::BASE_URL]);
    }

    abstract public function sendRequest(string $method, string $url, array $options);
}