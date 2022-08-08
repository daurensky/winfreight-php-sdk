<?php

namespace Daurensky\WinfreightPhpSdk;

use Daurensky\WinfreightPhpSdk\Client\AuthorizedClient;
use Daurensky\WinfreightPhpSdk\Client\BaseClient;
use Daurensky\WinfreightPhpSdk\Security\Authorization;

class Winfreight
{
    /** @var AuthorizedClient */
    protected $authorizedClient;

    /** @var BaseClient */
    protected $baseClient;

    /** @var Authorization */
    protected $authorization;

    public function __construct(string $username, string $password)
    {
        $authorization = Authorization::fromPassword($username, $password);

        $this->authorization = $authorization;
        $this->authorizedClient = new AuthorizedClient($authorization);
        $this->baseClient = new BaseClient();
    }

    public function setToken(string $accessToken, int $expiresIn)
    {
        $this->authorization
            ->withAccessToken($accessToken)
            ->withExpiresIn($expiresIn);
    }

    public function rottenToken(): bool
    {
        return $this->authorization->expired() || $this->authorization->badAccessToken();
    }

    public function renewToken(): Authorization
    {
        $body = [
            'username'   => $this->authorization->getUsername(),
            'password'   => $this->authorization->getPassword(),
            'grant_type' => $this->authorization->getGrantType(),
        ];

        $response = $this->baseClient->post('token', compact('body'));
        $json = $response->json();

        return $this->authorization
            ->withAccessToken($json['access_token'])
            ->withExpiresIn(time() + $json['expires_in']);
    }

    public function getHubCodes(array $query)
    {
        $response = $this->authorizedClient->get('GetHubCode', compact('query'));
        return $this->resultSets($response->json());
    }

    public function getServCode(array $query)
    {
        $response = $this->authorizedClient->get('GetServCode', compact('query'));
        return $this->resultSets($response->json());
    }

    public function createPortalWaybill(array $query)
    {
        $response = $this->authorizedClient->post('CreatePortalWaybill', compact('query'));
        return $this->resultSets($response->json());
    }

    public function createParcel(array $query)
    {
        $response = $this->authorizedClient->post('createdims', compact('query'));
        return $this->resultSets($response->json());
    }

    protected function resultSets($json)
    {
        if (!$json) {
            return $json;
        }

        if (!isset($json['ResultSets'])) {
            return $json;
        }

        return $json['ResultSets'];
    }
}