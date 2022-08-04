<?php

namespace Daurensky\WinfreightPhpSdk\Security;

class Authorization
{
    /** @var string|null */
    protected $username;

    /** @var string|null */
    protected $password;

    /** @var string */
    protected $grantType = 'password';

    /** @var string|null */
    protected $accessToken;

    /** @var string|null */
    protected $expiresIn;

    public static function fromPassword(string $username, string $password): Authorization
    {
        return (new static())
            ->withUsername($username)
            ->withPassword($password);
    }

    public function expired(): bool
    {
        return time() >= $this->expiresIn;
    }

    public function badAccessToken(): bool
    {
        return !is_string($this->accessToken) || $this->accessToken === '';
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function withUsername(string $username): Authorization
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function withPassword(string $password): Authorization
    {
        $this->password = $password;
        return $this;
    }

    public function getGrantType(): ?string
    {
        return $this->grantType;
    }

    public function withGrantType(string $grantType): Authorization
    {
        $this->grantType = $grantType;
        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function withAccessToken(string $accessToken): Authorization
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getExpiresIn(): ?int
    {
        return $this->expiresIn;
    }

    public function withExpiresIn(int $expiresIn): Authorization
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }
}